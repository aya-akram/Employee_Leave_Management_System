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
        <form name="edit_employee" method="POST" action="{{ route('admin.updateDepartment', $department->id) }}">
            @csrf
            @method('PUT')
            <div class="card-body">

                <p class="text-muted font-14 mb-4">Please fill up the form in order to add new department</p>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Department Name</label>
                    <input class="form-control" value="{{$department->DepartmentName}}" name="departmentname" type="text" required id="example-text-input">
                </div>

                <div class="form-group">
                    <label for="example-text-input" class="col-form-label">Shortform</label>
                    <input class="form-control" name="departmentshortname" value="{{$department->DepartmentShortName}}" type="text" autocomplete="off" required id="example-text-input">
                </div>

                <div class="form-group">
                    <label for="example-email-input" class="col-form-label">Code</label>
                    <input class="form-control" name="deptcode" value="{{$department->DepartmentCode}}" type="text" autocomplete="off" required id="example-email-input">
                </div>




                <!-- Add the rest of the input fields here similar to the create form -->

                <button class="btn btn-primary" name="update" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
