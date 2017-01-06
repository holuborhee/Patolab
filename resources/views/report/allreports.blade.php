@extends('layouts.app')

@section('content')
        <div class="col-md-8 col-md-offset-2">
        @if(Auth::user()->type == 1)
            <nav aria-label="...">
                <ul class="pager">
                    <li class="previous"><a href="{{url('/patients')}}"><span aria-hidden="true">&larr;</span> All Patients</a>
                    </li>
    
                </ul>
            </nav>
            @endif
        <div class="page-header">
        @if(Auth::user()->type == 0)
            <a class="pull-right btn btn-warning" href="{{url('patients/'. Auth::user()->id)}}"><i class="fa fa-user"></i> View Personal Details</a>
        @elseif(Auth::user()->type == 1)
            <a class="pull-right btn btn-warning" href="{{url('patients/'. $user->id)}}"><i class="fa fa-eye"></i> View Patient's Details</a>
        @endif
        <h2 >{{$user->name}}</h2>


        </div>
        <?php $no = true; ?>
            @foreach(App\Report::where('patient_id',$user->id)->cursor() as $rp)
            <?php $no = false; ?>
            <div class="panel panel-default">
                
                <div class="panel-body">
                   <h3>{{$rp->name}}</h3>
                   <ul class="list-unstyled">
                   <li>Date: {{$rp->created_at}}</li>
                   <li>Number of Tests: {{$rp->tests->count()}} Tests</li>
                   </ul> 
                </div>

                <div class="panel-footer">

                  <ul class="list-inline pull-right">                    

                    </ul>
                    <ul class="list-inline">
                    <li><a href="{{url('/reports/' . $rp->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> View Report</a></li>
                    @if(Auth::user()->type == 1)
                    <li>
                    <a href="{{url('/reports/' . $rp->id . '/edit')}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit Report</a>
                    </li>
                    @endif

                    </ul>
                </div>
</div>
@endforeach
@if($no)
    <h4>No report for patient</h4>
@endif
        </div>
   
@endsection
