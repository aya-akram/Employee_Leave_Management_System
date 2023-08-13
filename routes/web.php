<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/admin/addEmployee',[EmployeeController::class,'create'])->name('admin.addEmployee');
Route::post('/admin/addEmployee', [EmployeeController::class,'store'])->name('admin.storeEmployee'); // Name the route
Route::get('/admin/employees', [EmployeeController::class, 'index'])->name('admin.employees');

Route::get('/admin/addDepartment',[DepartmentController::class,'create'])->name('admin.addDepartment');
Route::get('/admin/department',[DepartmentController::class,'index'])->name('admin.department');
Route::post('/admin/add_department', [DepartmentController::class,'store'])->name('department.store');

Route::get('/admin/employees/{id}/edit',[EmployeeController::class,'edit'])->name('admin.editEmployee');
Route::put('/admin/employees/{id}', [EmployeeController::class,'update'])->name('admin.updateEmployee');
Route::delete('/admin/employees/{id}',[EmployeeController::class,'destroy'])->name('admin.deleteEmployee');

Route::get('/employee/update/{empid}', [EmployeeController::class, 'update'])->name('employee.update');

// Define the route for viewing leave details for an employee
Route::get('/employee/leave/details/{leaveid}', [LeaveController::class, 'leaveDetails'])->name('employee.leave.details');


Route::get('admin/editDepartment/{id}',[DepartmentController::class,'edit'])->name('admin.editDepartment');
Route::put('admin/updateDepartment/{id}', [DepartmentController::class,'update'])->name('admin.updateDepartment');
Route::delete('admin/deleteDepartment/{id}',[DepartmentController::class,'destroy'])->name('admin.deleteDepartment');

Route::get('/admin/leave-section',[LeaveController::class,'index'])->name('admin.leaveSaction');
Route::get('/admin/add-leaveType',[LeaveController::class,'create'])->name('admin.addLeaveType');
Route::post('admin/add_leavetype', [LeaveController::class,'store'])->name('admin.add_leavetype');
Route::delete('admin/deleteLeaveType/{id}',[LeaveController::class,'delete'])->name('admin.deleteLeaveType');
Route::get('admin/editLeaveType/{id}', [LeaveController::class,'edit'])->name('admin.editLeaveType');
Route::post('admin/updateLeaveType/{id}',[LeaveController::class,'update'])->name('admin.updateLeaveType');


Route::get('admin/pendingLeaves', [LeaveController::class,'showPendingLeaves'])->name('admin.pendingLeaves');
Route::get('admin/approvedLeaves', [LeaveController::class,'showApprovedLeaves'])->name('admin.approvedLeaves');
Route::get('admin/declinedLeaves', [LeaveController::class,'showDeclinedLeaves'])->name('admin.declinedLeaves');
// Route::get('admin/indexLeves', [LeaveController::class,'indexx'])->name('admin.indexxLeaves');
Route::get('/leaves', [LeaveController::class, 'indexx'])->name('leaves.indexx');


Route::get('/employee/leaveHistory', [LeaveController::class,'showLeavesHistory'])->name('employee.leaveHistory');
Route::get('/employee/leave', [LeaveController::class,'showLeaves'])->name('employee.leave');
Route::post('/employee/leave', [LeaveController::class,'storeLeave'])->name('employee.storeLeave');
Route::put('/admin/leave/update-status/{id}', [App\Http\Controllers\LeaveController::class, 'updateLeaveStatus'])
    ->name('admin.updateLeaveStatus');

// Define the route for updating an employee
Route::get('/employee/update/{empid}', [EmployeeController::class, 'updatee'])->name('employee.update');


Route::get('admin/dashboard',[AdminController::class,'index'])->name('admin.dashboard');
Route::get('admin/leaves/{id}', [AdminController::class,'show'])->name('admin.leaves.show');
Route::post('admin/leaves/{id}/set-action', [AdminController::class,'setAction'])->name('admin.leaves.setAction');
Route::delete('/admin/leaves/{id}',[AdminController::class,'destroy'])->name('admin.deleteLeave');

// Define the route for viewing leave details for an employee
Route::get('/employee/leave/details/{leaveid}', [LeaveController::class, 'leaveDetailss'])->name('employee.leave.details');
require __DIR__.'/auth.php';
