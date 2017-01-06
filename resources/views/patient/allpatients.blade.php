@extends('layouts.app')

@section('content')
        <div class="col-md-8 col-md-offset-2">

        <div class="page-header">
        <a class="pull-right btn btn-primary" href="{{ url('/patients/create') }}"><i class="fa fa-plus"></i> Add New Patient</a>
        <h2 >Patients</h2>


        </div>

        <!--<div class="form-group">
        <input type="text" class="form-control input-lg" placeholder="Search patient by Registration Number or Name" />
        </div>-->
            <div class="patients-div">
            @include("patient.patientsummary",['patients'=>$patients])
            {{ $patients->links() }}
            </div>
        </div>
   
@endsection
