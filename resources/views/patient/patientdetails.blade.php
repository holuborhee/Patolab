@extends('layouts.app')

@section('content')
        <div class="col-md-8 col-md-offset-2">
            <nav aria-label="...">
                <ul class="pager">
                @if(Auth::user()->type == 1)
                    <li class="previous"><a href="{{url('/patients')}}"><span aria-hidden="true">&larr;</span> All Patients</a>
                    </li>
                @elseif(Auth::user()->type == 0)
                    <li class="previous"><a href="{{url('/reports')}}"><span aria-hidden="true">&larr;</span> All Reports</a>
                    </li>
                @endif
    
                </ul>
            </nav>
        <div class="page-header">
        

            @if(Auth::user()->type == 1)
        <a href="" onclick="event.preventDefault();
                        if(confirm('You are about to delete this Patient, All records will be lost')){
                                                     document.getElementById('delete-form').submit();}" class="pull-right btn btn-danger"><i class="fa fa-trash"></i> Delete Patient</a></li> 

            
                    <form id="delete-form" action="{{url('/patients/' . $user->id)}}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                        </form>
            @endif
        <h2 id="top-name">{{$user->name}}</h2>
        </div>
            

            <div class="panel panel-default">
                <div class="panel-heading">Basic Information</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user') }}">
                        {{ csrf_field() }}


                        <div class="form-group">
                            <label for="name" class="col-md-4">Registration Number</label>

                            <div class="col-md-6 value">
                                <p class="lead">{{$user->patient->regnumber}}</p>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="name" class="col-md-4">Name</label>

                            <div class="col-md-6 value">
                                <p class="lead">{{$user->name}}</p>
                            </div>
                            @if(Auth::user()->type == 1)
                            <a class="col-md-1 pull-right edit-link" href="{{ url('/patients/'.$user->id.'/edit?col=name') }}"><i class="fa fa-pencil"></i> Edit</a>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-md-4">Gender</label>

                            <div class="col-md-6 value">
                                <p class="lead">{{$user->patient->gender}}</p>
                            </div>
                            @if(Auth::user()->type == 1)
                            <a class="col-md-1 pull-right edit-link" href="{{ url('/patients/'.$user->id.'/edit?col=gender') }}"><i class="fa fa-pencil"></i> Edit</a>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="name" class="col-md-4">Date Of Birth</label>

                            <div class="col-md-6 value">
                                <p class="lead">{{$user->patient->dob}}</p>
                            </div>
                        </div>
                        
                        
                    </form>
                </div>
            </div>



            <div class="panel panel-default">
                <div class="panel-heading">Contact Information</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="col-md-4">E-Mail Address</label>

                            <div class="col-md-6 value">
                                <p class="lead">{{$user->email}}</p>
                            </div>
                            @if(Auth::user()->type == 1)
                            <a class="col-md-1 pull-right edit-link" href="{{ url('/patients/'.$user->id.'/edit?col=email') }}"><i class="fa fa-pencil"></i> Edit</a>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-4">Phone Number</label>

                            <div class="col-md-6 value">
                                <p class="lead">{{$user->phone}}</p>
                            </div>
                            @if(Auth::user()->type == 1)
                            <a class="col-md-1 pull-right edit-link" href="{{ url('/patients/'.$user->id.'/edit?col=phone') }}"><i class="fa fa-pencil"></i> Edit</a>
                            @endif
                        </div>

                        
                        
                        
                    </form>
                </div>
            </div>




            <div class="panel panel-default">
                <div class="panel-heading">Medical Information</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="col-md-4">Blood Group</label>

                            <div class="col-md-6 value">
                                <p class="lead">{{$user->patient->blood_group}}</p>
                            </div>
                            @if(Auth::user()->type == 1)
                            <a class="col-md-1 pull-right edit-link" href="{{ url('/patients/'.$user->id.'/edit?col=blood_group') }}"><i class="fa fa-pencil"></i> Edit</a>
                            @endif
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-4">Genotype</label>

                            <div class="col-md-6 value">
                                <p class="lead">{{$user->patient->genotype}}</p>
                            </div>
                            @if(Auth::user()->type == 1)
                            <a class="col-md-1 pull-right edit-link" href="{{ url('/patients/'.$user->id.'/edit?col=genotype') }}"><i class="fa fa-pencil"></i> Edit</a>
                            @endif
                        </div>


                        <div class="form-group">
                            <label for="description" class="col-md-4">Medical History</label>

                            <div class="col-md-6 value">
                                <p class="lead">{{$user->patient->medical_history}}</p>
                            </div>
                            @if(Auth::user()->type == 1)
                            <a class="col-md-1 pull-right edit-link" href="{{ url('/patients/'.$user->id.'/edit?col=medical_history') }}"><i class="fa fa-pencil"></i> Edit</a>
                            @endif
                        </div>
                        
                        
                    </form>
                </div>
            </div>


            @if(Auth::user()->type == 1)
            <div class="panel panel-default">
                <div class="panel-heading">Security</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="email" class="col-md-4">Pass Code</label>

                            <div class="col-md-4 value">
                                <p class="lead"></p>
                            </div>
                            <a class="col-md-1 pull-right edit-link" href="{{ url('/patients/'.$user->id.'/edit?col=password') }}"><i class="fa fa-pencil"></i> Change Pass Code</a>
                        </div>                       
                        
                        
                    </form>
                </div>
            </div>
            @endif

        </div>
   
@endsection
