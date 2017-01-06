@extends('layouts.app')

@section('content')
        <div class="col-md-8 col-md-offset-2">

            <nav aria-label="...">
                <ul class="pager">
                    <li class="previous"><a href="{{url('/patients')}}"><span aria-hidden="true">&larr;</span> All Patients</a>
                    </li>
    
                </ul>
            </nav>
        <div class="page-header">
        
        <h2 >New Report <small>{{App\User::findOrFail($patient)->name}}</small></h2>


        </div>


        <div class="form-group">
            <a class="pull-right btn btn-success save-report"><i class="fa fa-lg fa-save"></i> Save All</a>
            <a class="btn btn-link btn-lg addtest" ><i class="fa fa-lg fa-plus"></i> Add Test</a>
        </div>
            
            <form class="form-horizontal new-report" role="form" method="POST" action="{{ url('/reports') }}">
                        {{ csrf_field() }}


                          <input type="hidden" name="patient" value="{{$patient}}" />
                        
              @include("report.newtest")
              
            </form>
            
        </div>
   
@endsection
