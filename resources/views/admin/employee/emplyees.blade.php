@extends('admin.master')


@section('content')
<div class="card">
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="card-body">
        <div class="data-tables datatable-dark">
            <center><a href="{{route('admin.addEmployee')}}" class="btn btn-sm btn-info">Add New Employee</a></center>
            <table id="dataTable3" class="table table-hover table-striped text-center">
                <thead class="text-capitalize">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Employe ID</th>
                        <th>Department</th>
                        <th>Joined On</th>
                        <th>Status</th>
                        <th>Action</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $employee->FirstName }} {{ $employee->LastName }}</td>
                        <td>{{ $employee->empcode }}</td>
                        <td>{{ $employee->Department }}</td>
                        <td>{{ $employee->created_at->format('d-m-Y') }}</td>
                        <td>{{ $employee->Status }}</td>
                        <td>
                            <div class="row">

                                <div class="col-md-3">
                                    <a href="{{ route('admin.editEmployee', $employee->id) }}" class="btn btn-sm btn-dark">Edit</a>
                                </div>
                                <div class="col-md-3">
                                    <form action="{{ route('admin.deleteEmployee', $employee->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
