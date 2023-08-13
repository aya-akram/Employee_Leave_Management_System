@extends('admin.master1')


@section('content')
<div class="container">
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">

                            <li class="#">
                                <a href="leave.php" aria-expanded="true"><i class="ti-user"></i><span>Apply Leave
                                    </span></a>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>
            <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Leave History Table</h4>

                                <div class="data-tables">
                                    <table id="dataTable" class="table table-hover progress-table text-center">
                                        <thead class="bg-light text-capitalize">
                                            <tr>
                                                <th>#</th>
                                                <th width="150">Type</th>
                                                <th>Conditions</th>
                                                <th>From</th>
                                                <th>To</th>
                                                <th width="150">Applied</th>
                                                <th width="120">Admin's Remark</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                @foreach ($leaves as $leave)
                                    <tr>
                                        <td>{{ $leave->id }}</td>
                                        <td>{{ $leave->LeaveType }}</td>
                                        <td>{{ $leave->Description }}</td>
                                        <td>{{ $leave->FromDate }}</td>
                                        <td>{{ $leave->ToDate }}</td>
                                        <td>{{ $leave->created_at }}</td>
                                        <td>{{ $leave->Description ?? '-' }}</td>
                                        <td>{{ $leave->Status }}</td>
                                        @if (auth()->user()->isAdmin())
                                            <td>
                                                <form method="POST" action="{{ route('admin.updateLeaveStatus', $leave->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <select name="status">
                                                        <option value="Approved">Approved</option>
                                                        <option value="Declined">Declined</option>
                                                        <option value="Pending">Pending</option>
                                                    </select>
                                                    <button type="submit">Update</button>
                                                </form>
                                            </td>
                                        @endif
                                    </tr>
                                @endforeach
                            </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

    @endsection
