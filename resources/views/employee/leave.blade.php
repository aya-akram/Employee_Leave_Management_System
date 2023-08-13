@extends('admin.master1')


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
                            <h4 class="page-title pull-left">Apply For Leave Days</h4>
                            <ul class="breadcrumbs pull-left">

                                <li><span>Leave Form</span></li>
                            </ul>
                        </div>
                    </div>

                </div>
            </div>
            <div class="card">
                                <form name="addemp" action="{{route('employee.storeLeave')}}" method="POST">
                                    @csrf

                                    <div class="card-body">
                                        <h4 class="header-title">Employee Leave Form</h4>
                                        <p class="text-muted font-14 mb-4">Please fill up the form below.</p>

                                        <div class="form-group">
                                            <label for="example-date-input" class="col-form-label">Starting Date</label>
                                            <input class="form-control" type="date" value="2020-03-05" data-inputmask="'alias': 'date'" required id="example-date-input" name="fromdate">
                                        </div>

                                        <div class="form-group">
                                            <label for="example-date-input" class="col-form-label">End Date</label>
                                            <input class="form-control" type="date" value="2020-03-05" data-inputmask="'alias': 'date'" required id="example-date-input" name="todate">
                                        </div>
                                        <label for="example-date-input" class="col-form-label">Select leave type</label>

                                        <select class="custom-select" name="leavetype" autocomplete="off">

                                                <option value="">Click here to select any leave type ...</option>
                                                @foreach($leavetypes as $leavetype)
                                                    <option value="{{ $leavetype->id }}">{{ $leavetype->LeaveType }}</option>
                                                @endforeach
                                            </select>


                                        <div class="form-group">
                                            <label for="example-text-input" class="col-form-label">Describe Your Conditions</label>
                                            <textarea class="form-control" name="description" type="text" name="description" length="400" id="example-text-input" rows="5"></textarea>
                                        </div>

                                        <button class="btn btn-primary" name="apply" id="apply" type="submit">SUBMIT</button>

                                    </div>
                                </form>
                                </div>
    @endsection
