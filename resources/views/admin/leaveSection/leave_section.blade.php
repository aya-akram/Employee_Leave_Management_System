@extends('admin.master')


@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="card">

        <div class="card-body">
            <div class="data-tables datatable-dark">
                <center><a href="{{route('admin.addLeaveType')}}" class="btn btn-sm btn-info">Add New Leave Type</a></center>
                <table id="dataTable3" class="table table-hover table-striped text-center">
                    <thead class="text-capitalize">
                        <tr>
                            <th>#</th>
                            <th>Leave Type</th>
                            <th>Description</th>
                            <th>Created</th>
                            <th></th>

                        </tr>
                    </thead>
                    <tbody>

                        @foreach($leaves as $leave)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $leave->LeaveType }}</td>
                            <td>{{ $leave->Description }}</td>
                            <td>{{ $leave->created_at->format('Y-m-d') }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-3">
                                        <a href="{{ route('admin.editLeaveType', $leave->id) }}"><i class="fa fa-edit" style="color:green"></i></a>
                                    </div>
                                    <div class="col-md-3">
                                        <form action="{{route('admin.deleteLeaveType', $leave->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                         <button>  <a type="submit"  onclick="return confirm('Do you want to delete?');"> <i class="fa fa-trash" style="color:red"></i></a></button> 
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
