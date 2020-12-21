<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin\Department;
use App\Models\Admin\MedicalFile;
use App\Models\Admin\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{

    /**
     * TicketController constructor.
     */
    public function __construct()
    {
        $this -> middleware('permission:create-ticket')->only('create');
        $this -> middleware('permission:read-ticket')->only('index');
        $this -> middleware('permission:update-ticket')->only('edit');
        $this -> middleware('permission:delete-ticket')->only('destroy');
    }

    public function index()
    {
        $tickets = Ticket::all(); // Show All tickets
        return view('admin.ticket.index', compact('tickets'));
    }

    public function create($medical_file_id)
    {
        $departments = Department::pluck('name', 'id')->toArray();
        $medicalFiles = MedicalFile::pluck('name', 'id')->toArray();
        return view('admin.ticket.create', compact('departments', 'medicalFiles', 'medical_file_id'));
    }


    public function store(Request $request)
    {
        $ticket_no = ['ticket_no' => random_int(1000,99999)];
        ticket::create($request -> all() + $ticket_no); // Create New ticket
        return redirect()->route('admin.ticket.index')->with('success', 'Ticket Added Successfully');
    }

    public function show($id)
    {
        $ticket = Ticket::select('case_report')->find($id);
        return view('admin.ticket.show', compact('ticket'));
    }

    public function edit($id)
    {
        $ticket = ticket::findOrFail($id);
        $departments = Department::pluck('name', 'id')->toArray();
        $medicalFiles = MedicalFile::pluck('name', 'id')->toArray();
        return view('admin.ticket.edit',compact('ticket', 'departments', 'medicalFiles'));
    }

    public function update(Request $request, $id)
    {
        $ticket = ticket::findOrFail($id);
        $ticket -> update($request -> all()); // Update Exist ticket
        return redirect() -> back()->with('success', 'Ticket Updated Successfully');
    }


    public function destroy($id)
    {
        ticket::findOrFail($id) -> delete(); // Delete ticket
        return redirect()->back()->with('delete', 'Ticket Deleted Successfully');
    }
}
