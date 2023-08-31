<?php

namespace App\Http\Controllers\Api;

use App\Models\Patient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Services\Patients\PatientServiceInterface;
use App\Http\Requests\StorePatientRequest;

class PatientController extends Controller
{
    protected $patientService;

    function __construct( PatientServiceInterface $patientService ) {
        $this->patientService = $patientService;
    }
    
    public function store(StorePatientRequest $request){
        try {
            $this->patientService->store([
                    'name' => $request->name,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'photo' => $request->photo,
                ]);
        
            return response()->json([
                'message' => "Patient successfully registered."
            ],200);
        } catch (\Exception $e) {
            return response()->json([
                // 'message' => "Server Error."
                'message' => $e->getMessage()
            ],500);
        }
    }
}
