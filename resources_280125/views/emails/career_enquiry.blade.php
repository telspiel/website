<p><strong>Name: </strong>{{$name}}</p>
<p><strong>Email: </strong>{{$email}}</p>
<p><strong>Phone: </strong>{{$phone}}</p>
<p><strong>Company: </strong>{{$company}}</p>
<p><strong>Message: </strong>{{$message_data}}</p>
@if(optional(\App\Models\CareerJob::where('id',$job_id)->first())->id)
<p><strong>Job Title: </strong>{{optional(\App\Models\CareerJob::where('id',$job_id)->first())->title}}</p>
@endif
@if(optional(\App\Models\JobLocation::where('id',$location_id)->first())->id)
<p><strong>Location: </strong>{{optional(\App\Models\JobLocation::where('id',$location_id)->first())->location}}</p>
@endif