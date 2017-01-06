@if(sizeof($patients)<1)
 <div class="panel panel-default">
                
                <div class="panel-body">
                   <h2>NO  Patient record Found</h2>
                </div>

                
</div>
@endif 

@foreach($patients as $p)
<div class="panel panel-default">
                
                <div class="panel-body">
                   <h3>{{$p->name}}</h3>
                   <ul class="list-unstyled">
                   <li>Blood Group: <strong>{{$p->patient->blood_group}}</strong></li>
                   <li>Genotype: <strong>{{$p->patient->genotype}}</strong></li>
                   <li>Gender: <strong>{{$p->patient->gender}}</strong></li>
                   <li>Date of Birth: <strong>{{$p->patient->dob}}</strong></li>
                   
                   </ul> 
                </div>

                <div class="panel-footer">

                  <ul class="list-inline pull-right">
                    <li><a href="{{url('/reports/create?patient=' . $p->id)}}" class="btn btn-warning">New Report</a></li>
                    <li><a href="{{url('/reports?patient=' . $p->id)}}" class="btn btn-success">All Reports ({{$p->reports()->count()}})</a></li>

                    </ul>
                    <ul class="list-inline">
                    <li><a href="{{url('/patients/' . $p->id)}}" class="btn btn-primary">View Profile</a>
                    </ul>
                </div>
</div>
@endforeach