<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Department;
use App\Models\Admin\Hospital;
use App\Models\Admin\hospital_department;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class HospitalController extends Controller
{

    /**
     * HospitalController constructor.
     */
    public function __construct()
    {
        $this -> middleware('permission:create-hospital')->only('create');
        $this -> middleware('permission:read-hospital')->only('index');
        $this -> middleware('permission:update-hospital')->only('edit');
        $this -> middleware('permission:delete-hospital')->only('destroy');
    }

    public function index()
    {
        $hospitals = Hospital::all(); // Show All Hospitals
        return view('admin.hospital.index', compact('hospitals'));
    }

    public function create()
    {
        $departments = Department::select('name', 'id')-> get();
        return view('admin.hospital.create', compact('departments'));
    }


    public function store(Request $request)
    {
//        dd($request -> all());
        $hospital_data = $request -> except('departments');
        $hospital = Hospital::create($hospital_data); // Create New Hospital
        Department::all() ->isNotEmpty()?$hospital -> departments() -> attach($request -> departments):'';

        return redirect()->route('admin.hospital.index')->with('success', 'Hospital Added Successfully');
    }

    public function edit($id)
    {
        $hospital = Hospital::findOrFail($id);
        $departments = Department::all();
        $departmentsOfHospital = hospital_department::where('hospital_id', $id)->pluck('department_id', 'department_id')->toArray();
        return view('admin.hospital.edit',compact('hospital', 'departments', 'departmentsOfHospital'));
    }

    public function update(Request $request, $id)
    {
        $hospital_data = $request -> except('departments');
        $hospital = Hospital::findOrFail($id);
        $hospital -> update($hospital_data); // Update Exist hospital
        $hospital -> departments() -> sync($request -> departments);
        return redirect() -> back()->with('success', 'Hospital Updated Successfully');
    }


    public function destroy($id)
    {
        Hospital::findOrFail($id) -> delete(); // Delete hospital
        return redirect()->back()->with('delete', 'Hospital Deleted Successfully');
    }
}
