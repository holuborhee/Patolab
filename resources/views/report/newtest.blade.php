<div class="panel panel-default">
                
                <div class="panel-heading">
                <a href="" class="pull-right"><i class="fa fa-times "></i></a>
                <h4>New Test</h4>
                </div>
                

                        
                    <div class="panel-body">
                        <div class="form-group{{ $errors->has('name[]') ? ' has-error' : '' }}">
                            <label for="name[]" class="col-md-4 control-label">Test name/title</label>

                            <div class="col-md-6">
                                <input id="name[]" type="text" class="form-control" name="name[]" value="{{ old('name[]') }}" required autofocus>

                                @if ($errors->has('name[]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name[]') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('result[]') ? ' has-error' : '' }}">
                            <label for="result[]" class="col-md-4 control-label">Test Result</label>

                            <div class="col-md-6">
                                <textarea id="result[]" class="form-control" name="result[]" value="{{ old('result[]') }}" rows="7" required></textarea>

                                @if ($errors->has('result[]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('result[]') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group{{ $errors->has('physician[]') ? ' has-error' : '' }}">
                            <label for="physician[]" class="col-md-4 control-label">Physician</label>

                            <div class="col-md-6">
                                <input id="physician[]" type="text" class="form-control" name="physician[]" value="{{ old('physician[]') }}" required >

                                @if ($errors->has('physician[]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('physician[]') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>



                        <div class="form-group{{ $errors->has('date[]') ? ' has-error' : '' }}">
                            <label for="date[]" class="col-md-4 control-label">Date</label>

                            <div class="col-md-6">
                                <input id="date[]" type="date" class="form-control" name="date[]" value="{{ old('date[]') }}" required>

                                @if ($errors->has('date[]'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('date[]') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        </div>


                        
                        

                        
                    
</div>