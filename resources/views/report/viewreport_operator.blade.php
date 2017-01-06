@extends('layouts.app')

@section('content')
        <div class="col-md-8 col-md-offset-2">
        @if(Auth::user()->type == 1)
            <nav aria-label="...">
                <ul class="pager">
                    <li class="previous"><a href="{{url('/patients')}}"><span aria-hidden="true">&larr;</span>All Patients</a>
                    </li>
    
                </ul>
            </nav>
        @endif

        @if(Auth::user()->type == 0)
            <nav aria-label="...">
                <ul class="pager">
                    <li class="previous"><a href="{{url('/reports')}}"><span aria-hidden="true">&larr;</span>All Reports</a>
                    </li>
    
                </ul>
            </nav>
        @endif
        <div class="page-header">
            @if(Auth::user()->type == 1)
            <ul class="list-inline pull-right">

            <li><a href="{{url('/reports/' . $report->id . '/edit')}}" class="btn btn-warning"><i class="fa fa-pencil"></i> Edit Report</a></li>
        <li><a href="" onclick="event.preventDefault();
                        if(confirm('You are about to delete this Report, All records will be lost')){
                                                     document.getElementById('delete-form').submit();}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete Report</a></li> 

            
                    <form id="delete-form" action="{{url('/reports/' . $report->id)}}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
            </ul>
        @endif
        
        <h2 >{{$report->name}}</h2>
        <p>{{$report->user->name}}</p>


        </div>
        @foreach(App\Test::where('report_id', $report->id)->cursor() as $t)
            <div class="panel panel-default">

            <div class="panel-heading">
            <ul class="list-inline pull-right">
                    </ul>
                    <ul class="list-inline">
                    
                      <li><i class="fa fa-calendar"></i> {{$t->date}}</li>

                    </ul>
            </div>
                <div class="panel-body">
                   <div class="media">
  
  <div class="media-body">
    <h4 class="media-heading">{{$t->name}}</h4>
    {{$t->result}}
  </div>
</div>
                </div>

                <div class="panel-footer">
                <h5>Physician: <strong>{{$t->physician}}</strong></h5>
                  
                </div>
</div>
@endforeach

<a href="{{url('/reports/'.$report->id.'?pdf=export')}}" class="btn btn-success">Export as PDF</a>
@if(Auth::user()->type == 0)
<a href="{{url('/reports/'.$report->id.'?pdf=email')}}" class="pull-right btn btn-danger">Email PDF</a>
@endif
        </div>
   
@endsection
