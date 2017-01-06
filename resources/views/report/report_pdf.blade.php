        <center>
        <h2 >Patolab Report for Patients</h2>
        </center>

        <h3 >Report: {{$report->name}}</h3>
        <h3 >Patient Name: {{$report->user->name}}</h3 >


        
        @foreach(App\Test::where('report_id', $report->id)->cursor() as $t)
        <center>
        <h2 >{{$t->name}}</h2>
        </center>
        <p>{{$t->result}}</p>
        <h5>Physician: <strong>{{$t->physician}}</strong></h5>
        <p>{{$t->date}}</p>

        @endforeach
            

