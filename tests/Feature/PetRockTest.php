<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\PetRock;

class PetRockTest extends TestCase {

    use RefreshDatabase;

    /** @test */
    public function a_pet_rock_can_be_created() {
        $response = $this->post('/petrock', [
            'name' => 'Steven',
            'bio' => 'Steven is a thousand years old.',
            'size' => 'medium'
        ]);

        $response->assertRedirect();
        $this->assertCount(1, PetRock::all());
    }

    /** @test */
    public function a_pet_rock_can_not_be_created_without_a_name() {
        $response = $this->post('/petrock', [
            'bio' => 'Who am I?'
        ]);

        $response->assertStatus(500);
        $this->assertCount(0, PetRock::all());
    }

    /** @test */
    public function a_pet_rock_can_be_retrieved_by_id() {
        $petRock = PetRock::factory()->create();

        $response = $this->get("/petrock/{$petRock->id}");
        $retrievedPetRock = json_decode($response->baseResponse->content());

        $this->assertEquals($petRock->id, $retrievedPetRock->id);
        $this->assertEquals($petRock->name, $retrievedPetRock->name);
        $this->assertEquals($petRock->bio, $retrievedPetRock->bio);
    }

    /** @test */
    public function a_pet_rock_that_doesnt_exist_can_not_be_retrieved() {

        $response = $this->get("/petrock/1");
        $response->assertNotFound();
    }
    

    /** @test */
    //This is now a view, idk how to test it.
    /* public function all_pet_rocks_can_be_retrieved() {
        PetRock::factory()->count(10)->create();

        $response = $this->get("/petrock");
        $retrievedPetRocks = json_decode($response->baseResponse->content());

        $this->assertEquals(count($retrievedPetRocks), 10);

    } */

     /** @test */
     public function a_pet_rock_can_be_updated() {
        $petRock = PetRock::factory()->create();
        $newBio = "This rock is very smooth.";

        $response = $this->put("/petrock/{$petRock->id}", ['bio' => $newBio]);
        $updatedPetRock = PetRock::find($petRock->id);

        $response->assertRedirect();
        $this->assertEquals($newBio, $updatedPetRock->bio);
    }

    /** @test */
    public function a_pet_rock_that_doesnt_exist_can_not_be_updated() {

        $response = $this->put("/petrock/1", ['bio' => "this rock doesn't exist"]);
        $response->assertNotFound();
    }

    /** @test */
    public function a_pet_rock_can_be_deleted() {
        $petRock = PetRock::factory()->create();

        $this->delete("/petrock/{$petRock->id}");

        $this->assertNull(PetRock::find($petRock->id));
    }
}
