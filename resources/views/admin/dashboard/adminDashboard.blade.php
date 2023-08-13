@extends('admin.master')


@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    <div class="main-content">
        <div class="page-title-area">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <div class="breadcrumbs-area clearfix">
                        <h4 class="page-title pull-left">Dashboard</h4>
                        <ul class="breadcrumbs pull-left">
                            <li><a href="dashboard.php">Home/ </a><span>Admin's Dashboard</span></li>

                        </ul>
                    </div>
                </div>

            </div>
        </div>
        <div class="main-content-inner">
            <!-- sales report area start -->
            <div class="sales-report-area mt-5 mb-5">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">

                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-briefcase"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                    <h4 class="header-title mb-0">Available Leave Types: {{ count($leaves) }}</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1></h1>
                                        <span>Leave Types</span>
                                    </div>
                                </div>
                                <!-- <canvas id="coin_sales1" height="100"></canvas> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-users"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                    <h4 class="header-title mb-0">Registered Employees: {{ count($employees) }}</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1></h1>
                                        <span>Active Employees</span>
                                    </div>
                                </div>
                                <!-- <canvas id="coin_sales2" height="100"></canvas> -->
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="single-report">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-th-large"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                    <h4 class="header-title mb-0">Available Departments: {{ count($departments) }}</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1></h1>
                                        <span>Employee Departments</span>
                                    </div>
                                </div>
                                <!-- <canvas id="coin_sales3" height="100"></canvas> -->
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-spinner"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Pending Application: {{count($pendingApplications)}}</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1></h1>
                                        <span>Pending</span>
                                    </div>
                                </div>
                                <!-- <canvas id="coin_sales1" height="100"></canvas> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="single-report mb-xs-30">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-times"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Declined Application: {{count($declinedApplications)}}</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1></h1>
                                        <span>Declined</span>
                                    </div>
                                </div>
                                <!-- <canvas id="coin_sales2" height="100"></canvas> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="single-report">
                                <div class="s-report-inner pr--20 pt--30 mb-3">
                                    <div class="icon"><i class="fa fa-check-square-o"></i></div>
                                    <div class="s-report-title d-flex justify-content-between">
                                        <h4 class="header-title mb-0">Approved Application: {{count($approvedApplications)}}</h4>

                                    </div>
                                    <div class="d-flex justify-content-between pb-2">
                                        <h1></h1>
                                        <span>Approved</span>
                                    </div>
                                </div>
                                <!-- <canvas id="coin_sales3" height="100"></canvas> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sales report area end -->

            <!-- row area start -->
            <div class="row">

                <!-- trading history area start -->
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-between align-items-center">
                                <!-- <h4 class="header-title">Employee Leave History</h4> -->
                                <div class="trd-history-tabs">
                                    <ul class="nav" role="tablist">
                                        <li>
                                            <a class="active" data-toggle="tab" href="dashboard.php" role="tab">Recent List</a>
                                        </li>
                                    </ul>
                                </div>
                                <select class="custome-select border-0 pr-3">
                                    <option selected>Last 24 Hours</option>

                                </select>
                            </div>
                            <!-- <h4 class="header-title"></h4> -->
                            <div class="single-table">
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered table-striped progress-table text-center">
                                        <thead class="text-uppercase">

                                            <tr>
                                                <td>S.N</td>
                                                <td>Employee ID</td>
                                                <td width="120">Full Name</td>
                                                <td>Leave Type</td>
                                                <td>Applied On</td>
                                                <td>Current Status</td>
                                                <td>Actions</td>
                                                <td></td>
                                            </tr>
                                        </thead>

                                        <tbody>


                                        @foreach ($leaves as $key => $leave)
        <tr>
            <td><b>{{ $key + 1 }}</b></td>
            <td>{{ $leave->employee->id ?? 'N/A' }}</td>
            <td>{{$leave->employee->FirstName }} {{ $leave->employee->LastName }}</td>
            <td>{{ $leave->LeaveType ?? 'N/A' }}</td>
            <td>{{ $leave->created_at  }}</td>
            <td> @if ($leave->Status == 'Approved')
                <span style="color: green">Approved <i class="fa fa-check-square-o"></i></span>
            @elseif ($leave->Status == 'Declined')
                <span style="color: red">Declined <i class="fa fa-times"></i></span>
            @elseif ($leave->Status == 'Pending')
                <span style="color: blue">Pending <i class="fa fa-spinner"></i></span>
            @else
                {{ $leave->Status ?? 'N/A' }}
            @endif</td>
            <td>

                <a href="{{route('admin.leaves.show',$leave->id)}}" class="btn btn-sm btn-success" >View Details</a></button>


            </td>
            <td>
                <form action="{{ route('admin.deleteLeave', ['id' => $leave->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-dark" >Delete</button>

                                    </form>
                                </td>
        </tr>
    @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- trading history area end -->
            </div>
            <!-- row area end -->

        </div>
        <!-- row area start-->
    </div>
</div>

@endsection
