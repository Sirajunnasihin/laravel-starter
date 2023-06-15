<?php

namespace Tests\Feature\Api;

use App\Models\User;
use App\Models\Major;
use App\Models\Faculty;

use Tests\TestCase;
use Laravel\Sanctum\Sanctum;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class FacultyMajorsTest extends TestCase
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
    public function it_gets_faculty_majors(): void
    {
        $faculty = Faculty::factory()->create();
        $majors = Major::factory()
            ->count(2)
            ->create([
                'faculty_id' => $faculty->id,
            ]);

        $response = $this->getJson(
            route('api.faculties.majors.index', $faculty)
        );

        $response->assertOk()->assertSee($majors[0]->name);
    }

    /**
     * @test
     */
    public function it_stores_the_faculty_majors(): void
    {
        $faculty = Faculty::factory()->create();
        $data = Major::factory()
            ->make([
                'faculty_id' => $faculty->id,
            ])
            ->toArray();

        $response = $this->postJson(
            route('api.faculties.majors.store', $faculty),
            $data
        );

        $this->assertDatabaseHas('majors', $data);

        $response->assertStatus(201)->assertJsonFragment($data);

        $major = Major::latest('id')->first();

        $this->assertEquals($faculty->id, $major->faculty_id);
    }
}
