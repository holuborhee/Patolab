@extends('layouts.app')

@section('content')
        <div class="col-md-8 col-md-offset-2">
            <nav aria-label="...">
  <ul class="pager">
    <li class="previous"><a href="{{url('/patients')}}"><span aria-hidden="true">&larr;</span> All Patients </a></li>
    
  </ul>
</nav>
        <div class="page-header">
        <h2 >New Patient</h2>
        </div>

        <div id="reg-div">
        <div class="panel panel-default">
                <div class="panel-heading">Basic Information</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user') }}">
                        

                        <div class="form-group">
                            <label for="name" class="col-md-4 control-label">Full Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control allinputs" name="name" required autofocus>

                                
                                    <span class="help-block hidden">
                                        <strong></strong>
                                    </span>
                                
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="dob" class="col-md-4 control-label">Date of Birth</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" class="form-control allinputs" name="dob" required autofocus>

                                
                                    <span class="help-block hidden">
                                        <strong></strong>
                                    </span>
                                
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="gender" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <select id="gender" class="form-control allinputs" name="gender" value="" required>
                                <option disabled="disabled" selected>------- Choose an option ------</option>
                                <option value="0" >FEMALE</option>
                                <option value="1">MALE</option>
                                </select>

                                
                                    <span class="help-block hidden">
                                        <strong></strong>
                                    </span>
                                
                            </div>
                        </div>

                        
                    </form>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">Contact Information</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user') }}">
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control allinputs" name="email"  required>

                                
                                    <span class="help-block hidden="" ">
                                        <strong></strong>
                                    </span>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="phone" class="col-md-4 control-label">Phone Number</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control allinputs" name="phone" required>

                                
                                    <span class="help-block hidden">
                                        <strong></strong>
                                    </span>
                                
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="address" class="col-md-4 control-label">Contact Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control allinputs" name="address"  required>

                                
                                    <span class="help-block">
                                        <strong></strong>
                                    </span>
                                
                            </div>
                        </div>

                        

                        
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Medical Information</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/user') }}">
                       

                        <div class="form-group">
                            <label for="bloodgroup" class="col-md-4 control-label">Blood Group</label>

                            <div class="col-md-6">
                                <select id="bloodgroup" class="form-control allinputs" name="bloodgroup" value="" required>
                                <option disabled="disabled" selected>------- Choose an option ------</option>

                                <?php $blood_group = array("O+","O–","A+","A–","B+","B–","AB+","AB–"); ?>

                                @foreach($blood_group as $bl)
                                <option value="{{$bl}}" {{ old('bloodgroup') == '0' ?'selected':'' }} >{{$bl}}</option>
                                @endforeach
                                </select>

                                
                                    <span class="help-block hidden">
                                        <strong></strong>
                                    </span>
                                
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="genotype" class="col-md-4 control-label">Genotype</label>

                            <div class="col-md-6">
                                <select id="genotype" class="form-control allinputs" name="genotype" value="" required>
                                <option disabled="disabled" selected>------- Choose an option ------</option>

                                <?php $genotype = array("AA","AS","AC","SC","SS","CC"); ?>

                                @foreach($genotype as $bl)
                                <option value="{{$bl}}" {{ old('genotype') == '0' ?'selected':'' }} >{{$bl}}</option>
                                @endforeach
                                </select>

                                
                                    <span class="help-block hidden">
                                        <strong></strong>
                                    </span>
                                
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="medicalhistory" class="col-md-4 control-label">Medical Condition/History</label>

                            <div class="col-md-6">
                                <textarea id="medicalhistory" class="form-control allinputs" name="medicalhistory" required placeholder="Patients medical condition summary, any known disease or history" rows="7"></textarea>

                                
                                    <span class="help-block hidden">
                                        <strong></strong>
                                    </span>
                                
                            </div>
                        </div>

                        

                        
                    </form>
                </div>
            </div>

            <div class="form-group">
                            <div class="col-md-4 col-md-offset-6 pull-right">
                                <button type="submit" onclick="" class="btn btn-primary btn-block save-patient">
                                    Click to Save
                                </button>
                            </div>
            </div>

            </div>
   
@endsection
