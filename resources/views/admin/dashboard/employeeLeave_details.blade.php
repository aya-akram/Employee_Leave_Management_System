@extends('admin.master')


@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-success">
        {{ session('error') }}
    </div>
    @endif
    <div class="card">
        <div class="card-body">

            <div class="single-table">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center">

                        <tbody>

                            <tr>
                                <td><b>Employee ID:</b></td>
                                <td colspan="1">{{ $employee->id }}</td>
                                <td><b>Employee Name:</b></td>
                                <td colspan="1"><a target="_blank">{{ $employee->FirstName }} {{ $employee->LastName }}</a></td>
                                <td><b>Gender :</b></td>
                                <td colspan="1">{{ $employee->Gender }}</td>
                            </tr>

                            <tr>
                                <td><b>Employee Email:</b></td>
                                <td colspan="1">{{$employee->EmailId}}</td>
                                <td><b>Employee Contact:</b></td>
                                <td colspan="1">{{$employee->PhoneNumber}}</td>

                                <td><b>Leave Type:</b></td>
                                <td colspan="1">{{$leave->LeaveType}}</td>

                            </tr>

                            <tr>

                                <td><b>Leave From:</b></td>
                                <td colspan="1">{{$leave-> FromDate}}</td>
                                <td><b>Leave Upto:</b></td>
                                <td colspan="1">{{$leave->ToDate}}</td>

                            </tr>



                            <tr>
                                <td><b>Leave Applied:</b></td>
                                <td>{{ $leave->created_at  }}</td>

                                <td><b>Status:</b></td>
                                <td>
                                    @if ($leave->Status == 'Approved')
                                    <span style="color: green">Approved <i class="fa fa-check-square-o"></i></span>
                                    @elseif ($leave->Status == 'Declined')
                                    <span style="color: red">Declined <i class="fa fa-times"></i></span>
                                    @elseif ($leave->Status == 'Pending')
                                    <span style="color: blue">Pending <i class="fa fa-spinner"></i></span>
                                    @else
                                    {{ $leave->Status ?? 'N/A' }}
                                    @endif
                                </td>


                            </tr>

                            <tr>
                                <td><b>Leave Conditions: </b></td>
                                <td colspan="5">{{$leave->Description}}</td>

                            </tr>
                            <tr>
                                <td colspan="12">
                                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">SET ACTION</button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">SET ACTION</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form method="POST" action="{{ route('admin.leaves.setAction', $leave->id) }}" name="adminaction">
                                                    @csrf
                                                    <div class="modal-body">

                                                        <select class="custom-select" name="status" required="">
                                                            <option value="">Choose...</option>
                                                            <option value="1">Approved</option>
                                                            <option value="2">Decline</option>
                                                        </select></p>
                                                        <br>
                                                        <p><textarea id="textarea1" name="description" class="form-control" name="description" placeholder="Description" row="5" maxlength="500" required></textarea></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-success" name="update">Apply</button>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                   

                                </td>
                            </tr>

                            </form>
                            </tr>

                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
