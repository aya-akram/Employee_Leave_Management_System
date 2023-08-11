@extends('admin.master')

@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <form name="edit_employee" method="POST" action="{{ route('admin.updateEmployee', $employee->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">
                                        <p class="text-muted font-14 mb-4">Please fill up the form in order to add employee records</p>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Employee ID</label>
                                            <input class="form-control" value="{{$employee->empcode}}" name="empcode" type="text" autocomplete="off" required id="empcode" onBlur="checkAvailabilityEmpid()">
                                        </div>


                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">First Name</label>
                                            <input class="form-control" value="{{$employee->FirstName}}" name="firstName"  type="text" required id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Last Name</label>
                                            <input class="form-control"  value="{{$employee->LastName}}" name="lastName" type="text" autocomplete="off" required id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-email-input" class="col-form-label">Email</label>
                                            <input class="form-control" value="{{$employee->EmailId}}" name="email" type="email"  autocomplete="off" required id="example-email-input">
                                        </div>



                                        <div class="form-group">
                                            <label class="col-form-label">Preferred Department</label>
                                            <select class="custom-select" name="department" autocomplete="off">
                                                <option value="">Choose..</option>
                                                @foreach($departments as $department)
                                                    <option value="{{ $department->DepartmentName }}" {{ $employee->department == $department->DepartmentName ? 'selected' : '' }}>{{ $department->DepartmentName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-form-label">Gender</label>
                                            <select class="custom-select" name="gender" autocomplete="off">
                                                <option value="">Choose..</option>
                                                <option value="Male" {{ $employee->Gender == 'Male' ? 'selected' : '' }}>Male</option>
                                                <option value="Female" {{ $employee->Gender == 'Female' ? 'selected' : '' }}>Female</option>
                                                <option value="Other" {{ $employee->Gender == 'Other' ? 'selected' : '' }}>Other</option>
                                            </select>

                                        </div>

                                        <div class="form-group">
                                            <label for="example-date-input" class="col-form-label">D.O.B</label>
                                            <input class="form-control" value="{{$employee->Dob}}" type="date" name="dob" id="birthdate" >
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Contact Number</label>
                                            <input class="form-control" name="mobileno" value="{{$employee->PhoneNumber}}" type="tel"  maxlength="10" autocomplete="off" required>
                                        </div>


                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Country</label>
                                            <input class="form-control" name="country" type="text"  value="{{$employee->Country}}"  autocomplete="off" required id="example-text-input">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Address</label>
                                            <input class="form-control" name="address" type="text" value="{{$employee->Address}}"  autocomplete="off" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">City</label>
                                            <input class="form-control" name="city" type="text" value="{{$employee->City}}"  autocomplete="off" required>
                                        </div>

                                        <h4>Set Password for Employee Login</h4>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Password</label>
                                            <input class="form-control" name="password" type="password" value="{{$employee->Password}}"autocomplete="off" required>
                                        </div>



                <!-- Add the rest of the input fields here similar to the create form -->

                <button class="btn btn-primary" name="update" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
