<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor;
use App\Models\Admin\Hospital;
use App\Models\Admin\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{


    /**
     * PatientController constructor.
     */
    public function __construct()
    {
        $this -> middleware('permission:create-patient')->only('create');
        $this -> middleware('permission:read-patient')->only('index');
        $this -> middleware('permission:update-patient')->only('edit');
        $this -> middleware('permission:delete-patient')->only('destroy');
    }

    public function index()
    {
//        return Patient::find(1) -> medicalFile -> doctor ->name;
        $patients = Patient::all(); // Show All Patients
        return view('admin.patient.index', compact('patients'));
    }

    public function create()
    {
        $hospitals  = Hospital::pluck('name', 'id')->toArray();
        $doctors    = Doctor::pluck('name', 'id')->toArray();

//        return $hospitals;
        return view('admin.patient.create', compact('hospitals', 'doctors'));
    }


    public function store(Request $request)
    {
//        dd($request-> all());
        $patient = Patient::create($request -> all()); // Create New Patient
        $medical_data = ['name' => $patient -> identify, 'doctor_id' => $patient -> doctor_id];
//        dd($medical_data);
        $patient -> medicalFile() -> create($medical_data);
        return redirect()->route('admin.patient.index')->with('success', 'Patient Added Successfully');
    }

    public function edit($id)
    {
        $patient    = Patient::findOrFail($id);
        $hospitals  = Hospital::pluck('name', 'id')->toArray();
        $doctors    = Doctor::pluck('name', 'id')->toArray();
        return view('admin.patient.edit',compact('patient', 'hospitals', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);
        $patient -> update($request -> all()); // Update Exist patient
        return redirect() -> back()->with('success', 'Patient Updated Successfully');
    }


    public function destroy(Request $request, $id)
    {
        Patient::findOrFail($id) -> delete(); // Delete patient
        return redirect()->back()->with('delete', 'Patient Deleted Successfully');
    }
}
