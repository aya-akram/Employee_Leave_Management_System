<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    
    public function index()
    {
        $employees = Employee::all(); // Retrieve all employees

        return view('admin.employee.emplyees', ['employees' => $employees]); // Return to the view with the employees
    }

    public function create(Request $request)
    {
        // In the method that shows the form
        $departments = Department::all();
        return view('admin.employee.add_employee', compact('departments'));

        // In the store method
        $employee = new Employee([
            // ... other fields ...
            'department_id' => $request->department,
        ]);
        $employee->save();
    }
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'empcode' => 'required|unique:employees',
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:employees,EmailId',
            'password' => 'required',
            'gender' => 'required',
            'dob' => 'required|date',
            'department' => 'required',
            'mobileno' => 'required|digits:10',
            'country' => 'required',
            'address' => 'required',
            'city' => 'required',
        ]);

        // Hash the password
        $request->merge(['password' => bcrypt($request->password)]);

        $employee = new Employee([
            'empcode' => $request->empcode,
            'FirstName' => $request->firstName,
            'LastName' => $request->lastName,
            'EmailId' => $request->email,
            'Password' => $request->password,
            'Gender' => $request->gender,
            'Dob' => $request->dob,
            'Department' => $request->department,
            'Address' => $request->address,
            'City' => $request->city,
            'Country' => $request->country,
            'PhoneNumber' => $request->mobileno, // Assuming this is the correct mapping
            'Status' => $request->status ?? 'Active', // Default to 'Active'
            'RegDate' => now()->format('Y-m-d'),
            'department_id' => $request->department,

        ]);
        $employee->save();
        // // Map the request data to the column names
        // $employeeData = [
        //     'empcode' => $request->empcode,
        //     'FirstName' => $request->firstName,
        //     'LastName' => $request->lastName,
        //     'EmailId' => $request->email,
        //     'Password' => $request->password,
        //     'Gender' => $request->gender,
        //     'Dob' => $request->dob,
        //     'Department' => $request->department,
        //     'Address' => $request->address,
        //     'City' => $request->city,
        //     'Country' => $request->country,
        //     'PhoneNumber' => $request->mobileno, // Assuming this is the correct mapping
        //     'Status' => $request->status ?? 'Active', // Default to 'Active'
        //     'RegDate' => now()->format('Y-m-d'),
        //     'department_id' => $request->department,

        // ];

        // // Create a new employee
        // Employee::create($employeeData);

        // Redirect with success message
        return redirect()->route('admin.addEmployee')->with('success', 'Employee added successfully');
    }
    public function edit($id)
    {
        $employee = Employee::find($id);
        $departments = Department::all(); // To show the departments in a dropdown
        return view('admin.employee.edit_employee', compact('employee', 'departments'));
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'empcode' => 'required|unique:employees,empcode,' . $id,
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:employees,EmailId,' . $id,
            'gender' => 'required',
            'dob' => 'required|date',
            'department' => 'required',
            'mobileno' => 'required|digits:10',
            'country' => 'required',
            'address' => 'required',
            'city' => 'required',
        ]);

        $employee = Employee::find($id);

        $employee->empcode = $request->empcode;
        $employee->FirstName = $request->firstName;
        $employee->LastName = $request->lastName;
        $employee->EmailId = $request->email;
        if ($request->password) { // If the password is set
            $employee->Password = bcrypt($request->password); // Hash new password
        }
        $employee->Gender = $request->gender;
        $employee->Dob = $request->dob;
        $employee->Department = $request->department;
        $employee->PhoneNumber = $request->mobileno;
        $employee->Country = $request->country;
        $employee->Address = $request->address;
        $employee->City = $request->city;
        // Handle other fields here if necessary

        $employee->save();

        return redirect()->route('admin.employees')->with('success', 'Employee updated successfully');
    }

    public function destroy($id)
    {
        $employee = Employee::find($id);
        $employee->delete();
        return redirect()->route('admin.employees')->with('success', 'Employee deleted successfully');
    }

    public function updatee($empid)
    {
        // Your logic to update the employee goes here

        return view('employee.update'); // Return a view, if necessary
    }
}
