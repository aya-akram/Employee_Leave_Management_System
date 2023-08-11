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
    <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Department Section</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="department.php">Department/ </a><span>Add</span></li>

                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
            <form method="POST" action="{{ route('department.store') }}">
    @csrf 
                                 <div class="card-body">

                                        <p class="text-muted font-14 mb-4">Please fill up the form in order to add new department</p>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Department Name</label>
                                            <input class="form-control" name="departmentname" type="text" required id="example-text-input" >
                                        </div>

                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Shortform</label>
                                            <input class="form-control" name="departmentshortname" type="text" autocomplete="off" required id="example-text-input" >
                                        </div>

                                        <div class="form-group">
                                            <label for="example-email-input" class="col-form-label">Code</label>
                                            <input class="form-control" name="deptcode" type="text" autocomplete="off" required id="example-email-input" >
                                        </div>

                                        <button class="btn btn-primary" name="add" id="add" type="submit">ADD</button>

                                    </div>
                                    </form>
            </div>

    @endsection

