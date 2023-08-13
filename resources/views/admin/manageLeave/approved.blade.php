@extends('admin.master')


@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Approved  Leaves</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="dashboard.php">Home/</a> <span>Approved List</span></li>

                            </ul>
                        </div>
                    </div>


                </div>
            </div>
            <div class="card">
                                        <div class="card-body">
                                        <!-- <h4 class="header-title"></h4> -->
                                        <div class="single-table">
                                            <div class="table-responsive">
                                                <table class="table table-hover table-striped table-bordered progress-table text-center">
                                                <thead class="text-uppercase">

                                                <tr>
                                                        <td>S.N</td>
                                                        <td>Employee ID</td>
                                                        <td width="120">Full Name</td>
                                                        <td>Leave Type</td>
                                                        <td>Applied On</td>
                                                        <td>Current Status</td>
                                                        <td></td>
                                                    </tr>
                                                </thead>

                                                <tbody>

                                                @foreach ($leaves as $leave)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $leave->empid }}</td>
                                                    <td>{{ $leave->employee->FirstName ?? '' }} {{ $leave->employee->LastName ?? '' }}</td>
                                                    <td>{{ $leave->LeaveType }}</td>
                                                    <td>{{ $leave->created_at }}</td>
                                                    <td> @if ($leave->Status == 'Approved')
                                                 <span style="color: green">Approved <i class="fa fa-check-square-o"></i></span>

                                                @else
                                                    {{ $leave->Status ?? 'N/A' }}
                                                @endif</td>                                                    <td>
                                                        <!-- Add action buttons if needed -->
                                                    </td>
                                                </tr>
                                            @endforeach
                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
    @endsection
