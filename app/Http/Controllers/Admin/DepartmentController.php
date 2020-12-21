<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Department;
use App\Models\Admin\Hospital;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DepartmentController extends Controller
{

    /**
     * DepartmentController constructor.
     */
    public function __construct()
    {
        $this -> middleware('permission:create-department')->only('create');
        $this -> middleware('permission:read-department')->only('index');
        $this -> middleware('permission:update-department')->only('edit');
        $this -> middleware('permission:delete-department')->only('destroy');
    }

    public function index()
    {
        $departments = Department::all(); // Show All department
        return view('admin.department.index', compact('departments'));
    }

    public function create()
    {
        $hospitals = Hospital::pluck('name', 'id')->toArray();
        return view('admin.department.create', compact('hospitals'));
    }


    public function store(Request $request)
    {
        Department::create($request -> all()); // Create New department
        return redirect()->route('admin.department.index')->with('success', 'department Added Successfully');
    }

    public function edit($id)
    {
        $department = Department::findOrFail($id);
        $hospitals = Hospital::pluck('name', 'id')->toArray();
        return view('admin.department.edit',compact('department', 'hospitals'));
    }

    public function update(Request $request, $id)
    {

        $department = Department::findOrFail($id);
        $department -> update($request -> all()); // Update Exist department
        return redirect() -> back()->with('success', 'Department Updated Successfully');
    }


    public function destroy($id)
    {
        Department::findOrFail($id) -> delete(); // Delete department
        return redirect()->back()->with('delete', 'Department Deleted Successfully');
    }
}
