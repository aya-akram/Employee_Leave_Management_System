<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function index() {
        $leaves = Leave::all();
        $employees = Employee::where('status', 'active')->get();
        $departments = Department::all();
        $pendingApplications = Leave::where('status', 'pending')->get();
        $declinedApplications = Leave::where('status', 'declined')->get();
        $approvedApplications = Leave::where('status', 'approved')->get();

        return view('admin.dashboard.adminDashboard', [
            'leaves' => $leaves,
            'employees' => $employees,
            'departments' => $departments,
            'pendingApplications' => $pendingApplications,
            'declinedApplications' => $declinedApplications,
            'approvedApplications' => $approvedApplications
        ]);
    }
    public function show($id) {
        $leave = Leave::findOrFail($id);
        $employee = $leave->employee; // assuming there is a relationship to the Employee model

        return view('admin.dashboard.employeeLeave_details', [
            'leave' => $leave,
            'employee' => $employee
        ]);
    }

    public function setAction(Request $request, $id) {
        $leave = Leave::findOrFail($id);

        // Validate the request
        $request->validate([
            'status' => 'required|in:1,2',
            'description' => 'required|max:500',
        ]);

        // Begin database transaction
        DB::beginTransaction();

        try {
            // Update the leave status and description

            $leave->status = $request->status == 'Approved' || 'Pending'  ? 'Approved' : 'Declined';
            $leave->description = $request->description;
            $leave->save();

            // Commit the transaction
            DB::commit();

            // Redirect back with success message
            return redirect()->back()->with('success', 'Action set successfully!');

        } catch (\Exception $e) {
            // Rollback the transaction in case of an error
            DB::rollBack();

            // Redirect back with an error message
            return redirect()->back()->with('error', 'An error occurred while setting the action.');
        }
    }

    public function destroy($id)
{
    try {
        // Find the leave by its ID
        $leave = Leave::findOrFail($id);

        // Delete the leave
        $leave->delete();

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Leave deleted successfully!');
    } catch (\Exception $e) {
        // Redirect back with an error message
        return redirect()->back()->with('error', 'An error occurred while deleting the leave.');
    }
}


}
