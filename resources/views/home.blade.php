@extends('welcome')
@section('title', 'CMG test app')
@section('content')
    @parent
	<br><br>
	<div><h2>Read our latest ads:</h2><br>
	<br>
	</div>
	<div class="ads">
		<hr>

	@foreach($ads as $ad)
		<p>Employer:<span style="font-weight:bold">{{ $ad->co_name }}</span> (OIB:{{ $ad->OIB }})<br>Hourly rate:{{ $ad->rate}} USD/hour<br>Job description:<br>{{ $ad->job_description }}<br><br>
		</p>
		<span class="updated">Last update: {{ date('j F, Y - G:i', strtotime($ad->updated_at)) }}, author: {{ $ad->user }}</span>
		<hr>
	@endforeach
	</div>
@endsection