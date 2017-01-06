<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Report;
use App\Patient;
use App\User;
use App\Test;
use Auth;
use PDF;
use PHPMailer;


class ReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        //dd($request->patient);
        if(Auth::user()->type==1)
            return view('report.allreports',['user'=>User::findOrFail($request->patient)]);
        else
            return view('report.allreports',['user'=>Auth::user()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //

        if($request->ajax())
            return view('report.newtest');
        return view('report.newreport',['patient'=>$request->patient]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $name = $request->input('name');
        $result = $request->input('result');
        $date = $request->input('date');
        $physician = $request->input('physician');
        $image = $request->input('file');
        
        //$names = $input['name'];
        
        
        
        
    
        $report = new Report();

        $report->name = $this->generate_report_name($request->patient);
        
        $report->operator_id = Auth::user()->id;

        $user = User::findOrFail($request->patient);

        $user->reports()->save($report);

        for ($i=0; $i < sizeof($name); $i++) {

            $test = new Test();

            $test->name = $name[$i];
            $test->result = $result[$i];
            $test->physician = $physician[$i];
            $test->date = $date[$i];

            $report->tests()->save($test);
       
        }

        return view('info',['title'=>'SUCCESS', 'message'=>'You have successfully added the report','link'=>url('/reports/'. $report->id),'text'=>'Go to Report']);

    }

    private function generate_report_name($id){
        $no = Report::where('patient_id', $id)->count();
        $no++;
        if($no >= 1000)
            return 'Report/0' . $no;
        else if($no >= 100)
            return 'Report/00' . $no;
        else if($no >= 10)
            return 'Report/000' . $no;
        else
            return 'Report/0000' . $no;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //
        $data = ['report'=> Report::findOrFail($id)];
        if($request->has('pdf'))
        {
            if($request->pdf == 'export'){
                $pdf = PDF::loadView('report.report_pdf',$data);
                    return $pdf->stream('report.pdf');
            }else if($request->pdf == 'email'){
                $pdf = PDF::loadView('report.report_pdf',$data);
                $pdf->save('js/report.pdf');
                $success = $this->setUpandSendMail(Auth::user()->email,$id);
                if($success)
                    return view('info',['title'=>'SUCCESS', 'message'=>'Message Succesfully sent','link'=>url('/reports/'. $id),'text'=>'Go back to Report']);
                else
                    return view('info',['title'=>'ERROR', 'message'=>'Message could not be sent','link'=>url('/reports/'. $id),'text'=>'Go back to Report and try Again']);

            } 
        }
        

        return view('report.viewreport_operator',$data);
    }

    private function setUpandSendMail($email,$id){
        
        //Create a new PHPMailer instance
        $mail = new PHPMailer;
        //Tell PHPMailer to use SMTP
        $mail->isSMTP();
        //Enable SMTP debugging
        // 0 = off (for production use)
        // 1 = client messages
        // 2 = client and server messages
        $mail->SMTPDebug = 0;
        //Ask for HTML-friendly debug output
        $mail->Debugoutput = 'html';
        //Set the hostname of the mail server
        $mail->Host = 'smtp.gmail.com';
        // use
        // $mail->Host = gethostbyname('smtp.gmail.com');
        // if your network does not support SMTP over IPv6
        //Set the SMTP port number - 587 for authenticated TLS, a.k.a. RFC4409 SMTP submission
        $mail->Port = 587;
        //Set the encryption system to use - ssl (deprecated) or tls
        $mail->SMTPSecure = 'tls';
        //Whether to use SMTP authentication
        $mail->SMTPAuth = true;

        $mail->Username = 'YOUR GMAIL ACCOUNT';
        $mail->Password = 'YOUR PASSWORD';

        $mail->setFrom('deejayolubori@yahoo.com', 'PATOLAB');
        $mail->addReplyTo('daveholuborhee@gmail.com', 'PATOLAB');

        $mail->addAddress($email);

        $mail->Subject = 'PATOLAB TEST REPORT FOR YOU';
        $mail->Body = 'Hello, Find attached the report for your test.';
        $mail->AltBody = 'ALT BODY';
        $mail->addAttachment('js/report.pdf');

        if(!$mail->Send())
        {
            //return view('info',['title'=>'ERROR', 'message'=>'Message could not be sent','link'=>url('/reports/'. $id),'text'=>'Go back to Report and try Again']);
            return false;
        }
        return true;
        //return view('info',['title'=>'SUCCESS', 'message'=>'Message Succesfully sent','link'=>url('/reports/'. $id),'text'=>'Go back to Report']);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = ['report'=>Report::findOrFail($id)];
        return view('report.editreport',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $report = Report::findOrFail($id);
        $name = $request->input('name');
        $result = $request->input('result');
        $date = $request->input('date');
        $physician = $request->input('physician');
        $image = $request->input('file');
        $test_id = $request->input('test');


        for ($i=0; $i < sizeof($test_id); $i++) {

            $test = Test::findOrFail($test_id[$i]);

            $test->name = $name[$i];
            $test->result = $result[$i];
            $test->physician = $physician[$i];
            $test->date = $date[$i];

            $test->save();
       
        }

        return view('info',['title'=>'SUCCESS', 'message'=>'You have successfully updated the report','link'=>url('/reports/'. $report->id),'text'=>'Go to Report']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $report = Report::findOrFail($id);

        $patient_id = $report->patient_id;
        
            
            $tests = $report->tests()->get();

            foreach ($tests as $t) {
                Test::destroy($t->id);
            }
        Report::destroy($id);
        return view('info',['title'=>'SUCCESS', 'message'=>'You have successfully deleted the report','link'=>url('/reports?patient='.$patient_id),'text'=>'Go to All Reports for the patient']);
    }
}
