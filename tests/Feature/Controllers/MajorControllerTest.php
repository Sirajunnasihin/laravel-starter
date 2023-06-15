<?php

namespace Tests\Feature\Controllers;

use App\Models\User;
use App\Models\Major;

use App\Models\Faculty;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MajorControllerTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $this->actingAs(
            User::factory()->create(['email' => 'admin@admin.com'])
        );

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_displays_index_view_with_majors(): void
    {
        $majors = Major::factory()
            ->count(5)
            ->create();

        $response = $this->get(route('majors.index'));

        $response
            ->assertOk()
            ->assertViewIs('app.majors.index')
            ->assertViewHas('majors');
    }

    /**
     * @test
     */
    public function it_displays_create_view_for_major(): void
    {
        $response = $this->get(route('majors.create'));

        $response->assertOk()->assertViewIs('app.majors.create');
    }

    /**
     * @test
     */
    public function it_stores_the_major(): void
    {
        $data = Major::factory()
            ->make()
            ->toArray();

        $response = $this->post(route('majors.store'), $data);

        $this->assertDatabaseHas('majors', $data);

        $major = Major::latest('id')->first();

        $response->assertRedirect(route('majors.edit', $major));
    }

    /**
     * @test
     */
    public function it_displays_show_view_for_major(): void
    {
        $major = Major::factory()->create();

        $response = $this->get(route('majors.show', $major));

        $response
            ->assertOk()
            ->assertViewIs('app.majors.show')
            ->assertViewHas('major');
    }

    /**
     * @test
     */
    public function it_displays_edit_view_for_major(): void
    {
        $major = Major::factory()->create();

        $response = $this->get(route('majors.edit', $major));

        $response
            ->assertOk()
            ->assertViewIs('app.majors.edit')
            ->assertViewHas('major');
    }

    /**
     * @test
     */
    public function it_updates_the_major(): void
    {
        $major = Major::factory()->create();

        $faculty = Faculty::factory()->create();

        $data = [
            'name' => $this->faker->name(),
            'desc' => $this->faker->text(255),
            'faculty_id' => $faculty->id,
        ];

        $response = $this->put(route('majors.update', $major), $data);

        $data['id'] = $major->id;

        $this->assertDatabaseHas('majors', $data);

        $response->assertRedirect(route('majors.edit', $major));
    }

    /**
     * @test
     */
    public function it_deletes_the_major(): void
    {
        $major = Major::factory()->create();

        $response = $this->delete(route('majors.destroy', $major));

        $response->assertRedirect(route('majors.index'));

        $this->assertSoftDeleted($major);
    }
}
