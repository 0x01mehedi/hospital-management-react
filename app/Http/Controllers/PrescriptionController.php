<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Prescription;
use App\Models\Doctor;
use App\Models\Patient;
use App\Models\Medicine;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{

    public function index()
{
    //$prescriptions = Prescription::all();
    return response()->json(["prescriptions"=>Prescription::All()]);
    //return view('pages.prescription.index', compact('prescriptions'));
}

    // public function create()
    // {
    //     // $prescriptions = Prescription::all();
    //     $prescriptions = DB::table('prescriptions')->get();
    //     // Fetch necessary data here, if needed
    //      $doctors = Doctor::all();
    //     // $patients = Patient::all();

    //     return view('pages.prescription.create',  ["prescription"=>$prescriptions,"doctor" => $doctors]);
    // }

    public function create()
{
    $prescriptions = DB::table('prescriptions')->get();
    $doctors = Doctor::all();
    $patients = Patient::all();
    $medicines = Medicine::all();
    return view('pages.prescription.create', compact('prescriptions', 'doctors', 'patients', 'medicines'));
}


    // Store a newly created prescription in storage
    public function store(Request $request)
    {
        // Store prescription logic here
        $doctors = Doctor::all();
        return redirect()->route('prescriptions.index')->with('success', 'Prescription created successfully.');
    }

    // Display the specified prescription
    public function show($id)
    {
        // Show prescription details logic here

        return view('prescription.show', compact('prescription'));
    }

    // Show the form for editing the specified prescription
    public function edit($id)
    {
        // Fetch necessary data here, if needed
        $doctors = Doctor::all();
        $patients = Patient::all();
        $prescription = Prescription::findOrFail($id);

        return view('prescription.edit', compact('doctors', 'patients', 'prescription'));
    }

    // Update the specified prescription in storage
    public function update(Request $request, $id)
    {
        // Update prescription logic here

        return redirect()->route('prescriptions.index')->with('success', 'Prescription updated successfully.');
    }

    // Remove the specified prescription from storage
    public function destroy($id)
    {
        // Delete prescription logic here

        return redirect()->route('prescriptions.index')->with('success', 'Prescription deleted successfully.');
    }

    // Method to find doctor details
    public function findDoctor(Request $request)
    {
        $doctorId = $request->input('id');
        $doctor = Doctor::find($doctorId);

        return response()->json(['doctor' => $doctor]);
    }

    // Method to find patient details
    public function findPatientDetails(Request $request)
    {
        $patientId = $request->input('id');
        $patient = Patient::find($patientId);

        return response()->json(['patient' => $patient]);
    }
}
