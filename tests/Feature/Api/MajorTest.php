<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Major;

use App\Models\Faculty;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MajorTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create(['email' => 'admin@admin.com']);

        Sanctum::actingAs($user, [], 'web');

        $this->seed(\Database\Seeders\PermissionsSeeder::class);

        $this->withoutExceptionHandling();
    }

    /**
     * @test
     */
    public function it_gets_majors_list(): void
    {
        $majors = Major::factory()
            ->count(5)
            ->create();

        $response = $this->getJson(route('api.majors.index'));

        $response->assertOk()->assertSee($majors[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_major(): void
    {
        $data = Major::factory()
            ->make()
            ->toArray();

        $response = $this->postJson(route('api.majors.store'), $data);

        $this->assertDatabaseHas('majors', $data);

        $response->assertStatus(201)->assertJsonFragment($data);
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

        $response = $this->putJson(route('api.majors.update', $major), $data);

        $data['id'] = $major->id;

        $this->assertDatabaseHas('majors', $data);

        $response->assertOk()->assertJsonFragment($data);
    }

    /**
     * @test
     */
    public function it_deletes_the_major(): void
    {
        $major = Major::factory()->create();

        $response = $this->deleteJson(route('api.majors.destroy', $major));

        $this->assertSoftDeleted($major);

        $response->assertNoContent();
    }
}
