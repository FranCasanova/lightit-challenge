<?php

namespace App\Services\Patients;

use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use App\Notifications\PatientRegistered;
use Illuminate\Support\Facades\Notification;


class PatientService implements PatientServiceInterface
{
    public function store($data){
        // file handling
        $imageName = Str::random(32).".".$data['photo']->getClientOriginalExtension();

        Storage::disk('public')->put($imageName, file_get_contents($data['photo']));

        // Saving model
        $patient = Patient::create([
            'full_name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone'],
            'document_photo' => $imageName,
        ]);

        // Sending email
        // Mail::to($patient->email)->send(new PatientRegistered);
        //$patient->sendConfirmationNotification();
        Notification::send($patient, new PatientRegistered());
        return $patient;
    }
}