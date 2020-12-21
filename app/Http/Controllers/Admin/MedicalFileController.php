<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Doctor;
use App\Models\Admin\MedicalFile;
use App\Models\Admin\Patient;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;

class MedicalFileController extends Controller
{
    /**
     * MedicalFileController constructor.
     */
    public function __construct()
    {
        $this -> middleware('permission:create-medicalFile')->only('create');
        $this -> middleware('permission:read-medicalFile')->only('index');
        $this -> middleware('permission:update-medicalFile')->only('edit');
        $this -> middleware('permission:delete-medicalFile')->only('destroy');
    }

    public function index()
    {
        $medicalFiles = MedicalFile::all(); // Show All medicalFiles
        return view('admin.medicalFile.index', compact('medicalFiles'));
    }

    public function create()
    {
        return view('admin.medicalFile.create');
    }


    public function store(Request $request)
    {
        medicalFile::create($request -> all()); // Create New medicalFile
        return redirect()->route('admin.medicalFile.index')->with('success', 'MedicalFile Added Successfully');
    }

    public function edit($id)
    {
        $medicalFile    = medicalFile::findOrFail($id);
        $patients       = Patient::pluck('name', 'id')->toArray();
        $doctors        = Doctor::pluck('name', 'id')->toArray();
        return view('admin.medicalFile.edit',compact('medicalFile', 'patients', 'doctors'));
    }

    public function update(Request $request, $id)
    {
//        dd($request -> all());
        $medicalFile = medicalFile::findOrFail($id);
        $medicalFile -> update($request -> all()); // Update Exist medicalFile
        return redirect() -> back()->with('success', 'MedicalFile Updated Successfully');
    }


    public function destroy($id)
    {
        medicalFile::findOrFail($id) -> delete(); // Delete medicalFile
        return redirect()->back()->with('delete', 'medicalFile Deleted Successfully');
    }
}
