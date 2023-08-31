<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Patient;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PatientTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    /** @test */
    public function test_example(): void
    {
        $this->withoutExceptionHandling();
        Storage::fake('uploads');

        $patientData = Patient::factory()->make();
 
        $file = UploadedFile::fake()->image('photo.jpg');

        $response = $this->postJson('/api/patients', [
            'fullname' => $patientData->fullname,
            'phoneNumber' => $patientData->phoneNumber,
            'email' => $patientData->email,
            'photo' => $file
        ]);
 
        $response
            ->assertStatus(201)
            ->assertJson([
                'created' => true,
            ]);
    }
}
