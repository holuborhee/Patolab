<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Patient;
use App\Test;
use App\Report;

class PatientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin',['except' => ['show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = User::where('type',0)->latest()->paginate(25);
        return view('patient.allpatients',['patients'=>$patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('patient.newpatient');
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

        $this->validate($request, [
            'email' => 'required|email|unique:users',
            'dob' => 'required|date_format:Y-m-d',
            'phone' => 'required|unique:users',
            
        ]);
        $passcode = str_random(7);
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->type = 0;

        $user->password = bcrypt($passcode);

        $user->save();

        $patient = new Patient();
        /*$patient = new Patient();*/
        $patient->regnumber = $this->generate_regnum();
        $patient->dob = $request->dob;
        $patient->address = $request->address;
        $patient->blood_group = $request->bloodgroup;
        $patient->genotype = $request->genotype;
        $patient->medical_history = $request->medicalhistory;
        $patient->gender = $request->gender;
        $user->patient()->save($patient);
        
        return view('patient.successnewpatient',['patient'=>$patient,'code'=>$passcode]);
        //return response()->json(['success'=>'fffsffsffs','request'=>$request->genotype], 200); 
    }


    private function generate_regnum(){
        $regnum = '';
        do{
            $refid = rand(10000, 99999);
            $regnum = 'PT/' .date('Y/m/d'). '/'.  $refid;
            $userRef = Patient::where('regnumber', $regnum)->first();
        }while($userRef!==null);
        
        return  $regnum;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('patient.patientdetails',['user'=>User::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        $value = '';
        $user = User::findOrFail($id);

        if($request->col == 'blood_group' OR $request->col == 'genotype' OR $request->col == 'medical_history' OR $request->col == 'gender')
        {
            $patient = $user->patient;
            $value = $patient[$request->col];
             
        }else
            $value = $user[$request->col];
        return response()->json(['success' => 'Successful','col' => $request->col, 'val'=>$value],200);
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
        $user = User::findOrFail($id);
        if($request->col == 'blood_group' OR $request->col == 'genotype' OR $request->col == 'medical_history' OR $request->col == 'gender')
        {
            $patient = $user->patient;
            if($request->col == 'gender')
                $patient[$request->col] = ucfirst($request->value) == 'Female'?0:1;
            else
                $patient[$request->col] = $request->value;
                $patient->save();
                $val = $patient[$request->col]; 
        }else if($request->col == 'password'){
        
        $user[$request->col] = bcrypt($request->value);
        $user->save();
        $val = $user[$request->col]; 
    }

        else{
        
        $user[$request->col] = $request->value;
        $user->save();
        $val = $user[$request->col]; 
    }
        return response()->json(['success' => 'Successful','col' => $request->col, 'val'=>$val],200);
 
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
        $user = User::findOrFail($id);
        $reports = $user->reports()->get();
        
        foreach ($reports as $rp) {
            
            $tests = $rp->tests()->get();

            foreach ($tests as $t) {
                Test::destroy($t->id);
            }
            Report::destroy($rp->id);
        }

        $p = $user->patient;
        
        Patient::destroy($p->id);

        User::destroy($id);
        return view('info',['title'=>'SUCCESS', 'message'=>'You have successfully deleted the user','link'=>url('/patients'),'text'=>'Go to All Patients']);
    }
}
