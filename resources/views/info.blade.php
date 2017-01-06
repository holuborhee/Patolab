@extends('layouts.app')

@section('content')
        <div class="col-md-8 col-md-offset-2">

            <nav aria-label="...">
                <ul class="pager">
                    <li class="previous"><a href="{{url('/patients')}}"><span aria-hidden="true">&larr;</span> All Patients</a>
                    </li>
    
                </ul>
            </nav>
        <h2>{{$title}}</h2>

        <p>{{$message}}</p>

        <a href="{{$link}}" class="btn btn-success btn-large">{{$text}}</a>


</div>
   
@endsection
