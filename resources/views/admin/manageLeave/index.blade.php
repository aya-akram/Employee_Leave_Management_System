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
                                <td></td>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($leaves as $index => $leave)
                            <tr>
                                <td><b>{{ $index + 1 }}</b></td>
                                <td>{{ $leave->EmpId }}</td>
                                <td>{{ $leave->LeaveType }}</td>
                                <td>{{ $leave->PostingDate }}</td>
                                <td>
                                    @if($leave->Status == 1)
                                    <span style="color: green">Approved <i class="fa fa-check-square-o"></i></span>
                                    @elseif($leave->Status == 2)
                                    <span style="color: red">Declined <i class="fa fa-times"></i></span>
                                    @elseif($leave->Status == 0)
                                    <span style="color: blue">Pending <i class="fa fa-spinner"></i></span>
                                    @endif
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
