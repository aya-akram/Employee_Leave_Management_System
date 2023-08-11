<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all(); // Retrieve all departments

        return view('admin.department.department', ['departments' => $departments]); // Return to the view with the departments
    }

    public function create()
    {
        return view('admin.department.add_department');
    }
    public function store(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'departmentname' => 'required|string|max:255',
            'departmentshortname' => 'required|string|max:255',
            'deptcode' => 'required|string|max:255',
        ]);

        // Create a new department using the validated data
        $department = Department::create([
            'DepartmentName' => $request->departmentname,
            'DepartmentShortName' => $request->departmentshortname,
            'DepartmentCode' => $request->deptcode,
        ]);

        // Redirect to a page of your choice with a success message
        return redirect()->route('admin.department')->with('success', 'Department added successfully!');
    }
    public function edit($id)
    {
        $department = Department::find($id);
        return view('admin.department.edit_department', compact('department')); // Return to the edit view with the department data
    }

    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'departmentname' => 'required|string|max:255',
            'departmentshortname' => 'required|string|max:255',
            'deptcode' => 'required|string|max:255',
        ]);

        $department = Department::find($id);
        $department->update([
            'DepartmentName' => $request->departmentname,
            'DepartmentShortName' => $request->departmentshortname,
            'DepartmentCode' => $request->deptcode,
        ]);

        // Redirect with a success message
        return redirect()->route('admin.department')->with('success', 'Department updated successfully!');
    }

    public function destroy($id)
    {
        $department = Department::find($id);
        $department->delete();
        return redirect()->route('admin.department')->with('success', 'Department deleted successfully!');
    }
}
