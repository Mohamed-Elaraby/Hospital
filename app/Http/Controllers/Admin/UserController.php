<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Traits\HelperTrait;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    use HelperTrait;

    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this -> middleware('permission:create-user')->only('create');
        $this -> middleware('permission:read-user')->only('index');
        $this -> middleware('permission:update-user')->only('edit');
        $this -> middleware('permission:delete-user')->only('destroy');
    }

    public function index()
    {
        $users = Auth::user()->hasRole('superAdmin')?
            User::all():
            User::whereHas('role', function ($query){
            $query -> where('name', '!=', 'superAdmin');
        }) -> get();

        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::pluck('name', 'id')->toArray();
        return view('admin.user.create', compact('roles'));
    }


    public function store(AddUserRequest $request)
    {
        $user_data = $request -> except('profile_picture', 'password'); // Get All Column Without [profile_picture]
        $user_data['password'] = Hash::make($request -> password);
        $image_data = $this->uploadImageProcessing($request -> profile_picture, 'user', 'profile', $request -> name, 'public', 100, 100); // Upload Image With Trait
        $user = User::create($user_data + $image_data); // Create New user From [user_data] Request And [image_data] Coming With Trait
        $user->attachRole($request -> role_id);
        return redirect()->route('admin.user.index')->with('success', 'User Added Successfully');
    }

    public function edit($id)
    {
        $user = User::whereHas('role', function ($q){
            $q -> where('name', '!=', 'superAdmin');
        }) ->findOrFail($id);
        $roles = Role::pluck('name', 'id')->toArray();
        return view('admin.user.edit',compact('user', 'roles'));
    }

    public function update(UpdateUserRequest $request, $id)
    {

        $user = User::findOrFail($id);
        $user_new_data = $request -> except('profile_picture'); // Get All Column Without [profile_picture]
        $image_data = $this->uploadImageProcessing($request -> profile_picture, 'user', 'profile', $request -> name, 'public', 100, 100, $user);
        $user->update($user_new_data + $image_data); // Create New user From [userData] Request
        $user->syncRoles([$request -> role_id]);
        return redirect() -> back()->with('success', 'user Updated Successfully');
    }


    public function destroy($id)
    {
        $user = User::findOrFail($id);
        if ($user -> image_name != 'default.png') { // Check If Profile Picture Name Not Equal Default Picture Name Do It
            $this -> deleteImageHandel('public', $user -> image_path); // Check If user Have Directory Profile Picture Delete It
        }
        $user -> delete(); // Delete user From user Table
        return redirect()->back()->with('delete', 'user Deleted Successfully');
    }

}
