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
                            <h4 class="page-title pull-left">Edit Leave Section</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="leave-section.php">Manage Type/</a><span>Add</span></li>

                            </ul>
                        </div>
                    </div>
                </div>
    </div>

    <div class="card">

    <form method="POST" action="{{ route('admin.updateLeaveType',$leave->id) }}">
        @csrf
                                         <div class="card-body">

                                        <p class="text-muted font-14 mb-4">Please fill up the form in order to add new leave type</p>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Leave Type</label>
                                            <input class="form-control" name="leavetype" type="text" value="{{$leave->LeaveType}}" required id="example-text-input" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Short Description</label>
                                            <input class="form-control" name="description" type="text" value="{{$leave->Description}}" autocomplete="off" required id="example-text-input" required>

                                        </div>

                                        <button class="btn btn-primary" name="add" id="add" type="submit">ADD</button>

                                    </div>
                                    </form>
                        </div>

    @endsection
