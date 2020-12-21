<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddAndUpdateDoctorRequest;
use App\Models\Admin\Doctor;
use App\Models\Admin\Hospital;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class DoctorController extends Controller
{
    use HelperTrait;

    /**
     * DoctorController constructor.
     */
    public function __construct()
    {
        $this -> middleware('permission:create-doctor')->only('create');
        $this -> middleware('permission:read-doctor')->only('index');
        $this -> middleware('permission:update-doctor')->only('edit');
        $this -> middleware('permission:delete-doctor')->only('destroy');
    }

    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.index', compact('doctors'));
    }

    public function create()
    {
        $hospitals = Hospital::pluck('name', 'id')->toArray();
        return view('admin.doctor.create', compact('hospitals'));
    }


    public function store(AddAndUpdateDoctorRequest $request)
    {
        $doctor_data = $request -> except('profile_picture'); // Get All Column Without [profile_picture]
        $image_data = $this->uploadImageProcessing($request -> profile_picture, 'doctor', 'profile', $request -> name, 'public', 100, 100); // Upload Image With Trait
        Doctor::create($doctor_data + $image_data); // Create New Doctor From [doctor_data] Request And [image_data] Coming With Trait
        return redirect()->route('admin.doctor.index')->with('success', 'Doctor Added Successfully');
    }

    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        $hospitals = Hospital::pluck('name', 'id')->toArray();
        return view('admin.doctor.edit',compact('doctor', 'hospitals'));
    }

    public function update(AddAndUpdateDoctorRequest $request, $id)
    {

        $doctor_old_data = Doctor::findOrFail($id);
        $doctor_new_data = $request -> except('profile_picture'); // Get All Column Without [profile_picture]
        $image_data = $this->uploadImageProcessing($request -> profile_picture, 'doctor', 'profile', $request -> name, 'public', 100, 100, $doctor_old_data);
        $doctor_old_data->update($doctor_new_data + $image_data); // Create New Doctor From [doctorData] Request
        return redirect() -> back()->with('success', 'Doctor Updated Successfully');
    }


    public function destroy($id)
    {
        $doctor = Doctor::findOrFail($id);
        if ($doctor -> image_name != 'default.png') { // Check If Profile Picture Name Not Equal Default Picture Name Do It
            $this -> deleteImageHandel('public', $doctor -> image_path); // Check If Doctor Have Directory Profile Picture Delete It
        }
        $doctor -> delete(); // Delete Doctor From Doctor Table
        return redirect()->back()->with('delete', 'Doctor Deleted Successfully');
    }

}
