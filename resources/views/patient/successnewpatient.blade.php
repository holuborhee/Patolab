<h2>New Patient Added</h2>

<p>You have successfully added the patient, <strong>Passcode will be sent to Patient's Phone Number</strong></p>

<h5>Patient Details</h5>
<ul>
<li>Registration Number: {{$patient->regnumber}}</li>
<li>Pass Code: {{$code}}</li>
</ul>

<a href="{{url('/reports/create?patient=' . $patient->user_id)}}" class="btn btn-success btn-lg">Create New Report for Patient</a>

