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
        <a class="pull-right btn btn-success update-report"><i class="fa fa-lg fa-save"></i> Save All</a>
        <h2 >{{$report->name}} </h2>


        </div>


        
            
            
        

            
            <form class="form-horizontal edit-report" role="form" method="POST" action="{{ url('/reports/' . $report->id) }}">
                        {{ csrf_field() }}

                        {{ method_field('PUT') }}
                          
                        @foreach($report->tests()->cursor() as $test)
                        <div class="panel panel-default">
                        <div class="panel-body">
                        <input type="hidden" name="test[]" value="{{ $test->id }}" />
                        <div class="form-group">
                            <label for="name[]" class="col-md-4 control-label">Test name/title</label>

                            <div class="col-md-6">
                                <input id="name[]" type="text" class="form-control" name="name[]" value="{{ $test->name }}" required autofocus>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="result[]" class="col-md-4 control-label">Test Result</label>

                            <div class="col-md-6">
                                <textarea id="result[]" class="form-control" name="result[]" rows="7" required>{{ $test->result }}</textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="physician[]" class="col-md-4 control-label">Physician</label>

                            <div class="col-md-6">
                                <input id="physician[]" type="text" class="form-control" name="physician[]" value="{{ $test->physician }}" required >
                            </div>
                        </div>

                       

                        <div class="form-group">
                            <label for="date[]" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                <input id="date[]" type="date" class="form-control" name="date[]" value="{{ $test->getOriginal('date') }}" required>
                            </div>
                        </div>

                        </div>
                        </div>
                    @endforeach
            </form>
            
        </div>
   
@endsection
