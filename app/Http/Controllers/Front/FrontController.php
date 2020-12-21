<?php

namespace App\Http\Controllers\Front;

use App\Models\Admin\Department;
use App\Models\Admin\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        $doctors = Doctor::all();
        return view('front.homePage', compact('departments', 'doctors'));
    }
}
