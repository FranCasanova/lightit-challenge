<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Notifications\PatientRegistered;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'full_name', 
        'email',
        'phone_number', 
        'document_photo' 
    ];

    public function sendConfirmationNotification()
    {
        $this->notify(new PatientRegistered($this));
    }
}
