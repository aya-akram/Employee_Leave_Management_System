<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Leavetype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leavetype::all(); // Retrieve all employees

        return view('admin.leaveSection.leave_section', ['leaves' => $leaves]); // Return to the view with the employees
    }
    public function indexx()
    {
        $leaves = Leave::join('employees', 'leaves.empid', '=', 'employees.id')
            ->select('leaves.*', 'employees.FirstName', 'employees.LastName', 'employees.id')
            ->orderByDesc('leaves.id')
            ->limit(7)
            ->get();

        return view('admin.manageLeave.index', compact('leaves'));
    }

    public function create(Request $request)
    {
        // In the method that shows the form
        $leaves = Leavetype::all();
        return view('admin.leaveSection.add_leavetype', compact('leaves'));
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validator = Validator::make($request->all(), [
            'leavetype' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new leave type using the validated data
        $leave = Leavetype::create([
            'LeaveType' => $request->leavetype,
            'Description' => $request->description,
        ]);

        // Redirect to a page of your choice with a success message
        return redirect()->route('admin.leaveSaction')->with('success', 'Leave type added successfully!');
    }
    public function delete($id)
    {
        $leave = Leavetype::find($id);

        if ($leave) {
            $leave->delete();
            return redirect()->route('admin.leaveSaction')->with('success', 'Leave type deleted successfully!');
        }

        return redirect()->route('admin.leaveSaction')->with('error', 'Leave type not found!');
    }
    public function edit($id)
    {
        $leave = Leavetype::find($id);

        if ($leave) {
            return view('admin.leaveSection.edit_leavetype', compact('leave'));
        }

        return redirect()->route('admin.leaveSaction')->with('error', 'Leave type not found!');
    }
    public function update(Request $request, $id)
    {
        $leave = Leavetype::find($id);

        if (!$leave) {
            return redirect()->route('admin.leaveSaction')->with('error', 'Leave type not found!');
        }

        $request->validate([
            'leavetype' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        $leave->LeaveType = $request->leavetype;
        $leave->Description = $request->description;
        $leave->save();

        return redirect()->route('admin.leaveSaction')->with('success', 'Leave type updated successfully!');
    }
    public function showPendingLeaves()
    {
        $leaves = Leave::where('Status', 'Pending')->get();
        return view('admin.manageLeave.pending', ['leaves' => $leaves]);
    }
    public function showApprovedLeaves()
    {
        $leaves = Leave::where('Status', 'Approved')->get();
        return view('admin.manageLeave.approved', ['leaves' => $leaves]);
    }
    public function showDeclinedLeaves()
    {
        $leaves = Leave::where('Status', 'Declined')->get();
        return view('admin.manageLeave.declined', ['leaves' => $leaves]);
    }

    public function showLeaves()
    {
        $leaves = Leave::where('empid', auth()->user()->id)->get();
        $leavetypes = Leavetype::all();
        return view('employee.leave', ['leaves' => $leaves, 'leavetypes' => $leavetypes]);
    }
    public function showLeavesHistory()
    {
        $leaves = Leave::where('empid', auth()->user()->id)->get();
        $leavetypes = Leavetype::all();
        return view('employee.leave_history', ['leaves' => $leaves, 'leavetypes' => $leavetypes]);
    }
    public function storeLeave(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'fromdate' => 'required|date',
            'todate' => 'required|date|after_or_equal:fromdate',
            'leavetype' => 'required|exists:leavetypes,id',
            'description' => 'required|string|max:255',
        ]);

        // Create a new leave record using the validated data
        $leave = Leave::create([
            'LeaveType' => $request->leavetype,
            'ToDate' => $request->todate,
            'FromDate' => $request->fromdate,
            'Description' => $request->description,
            'empid' => auth()->user()->id, // Assuming the employee ID is the authenticated user's ID
        ]);

        // Redirect to a page of your choice with a success message
        return redirect()->route('employee.leaveHistory')->with('success', 'Leave applied successfully!');
    }
    public function updateLeaveStatus(Request $request, $id)
    {
        $leave = Leave::find($id);

        if (!$leave) {
            return redirect()->back()->with('error', 'Leave not found!');
        }

        $request->validate([
            'status' => 'required|in:Approved,Declined,Pending',
        ]);

        $leave->Status = $request->status;
        $leave->save();

        return redirect()->route('employee.leaveHistory')->with('success', 'Leave status updated successfully!');
    }
    public function leaveDetailss($leaveid)
    {
        // Your logic to retrieve the leave details goes here

        return view('leave.details'); // Return a view, if necessary
    }
}
