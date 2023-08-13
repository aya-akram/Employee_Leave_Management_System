@extends('admin.master')


@section('content')
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Department Section</h4>

                            <ul class="breadcrumbs pull-left">
                                <li><a href="dashboard.php">Home/ </a><span>Department Management</span></li>


                            </ul>


                        </div>
                    </div>


                </div>
            </div>

            <div class="card-body">
                                <div class="data-tables datatable-dark">
                                <center><a href="{{route('admin.addDepartment')}}" class="btn btn-sm btn-success">Add New Department</a></center>
                                <hr>
                                <table id="dataTable3" class="table table-hover table-striped text-center">
                                        <thead class="text-capitalize">
                                            <tr>
                                                <th>#</th>
                                                <th>Department</th>
                                                <th>Shortform</th>
                                                <th>Code</th>
                                                <th>Created Date</th>

                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($departments as $department)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $department->DepartmentName }}</td>
                                                <td>{{ $department->DepartmentShortName }}</td>
                                                <td>{{ $department->DepartmentCode }}</td>
                                                <td>{{ $department->created_at->format('Y-m-d') }}</td>
                                                <td>
                                                <div class="row">

                                                    <div class="col-md-3">
                                                        <a href="{{ route('admin.editDepartment', $department->id) }}" class="btn btn-sm btn-dark">Edit</a>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <form action="{{ route('admin.deleteDepartment', $department->id) }}" method="post">
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
@endsection
