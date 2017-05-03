<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CMG test app</title>
		<link rel="stylesheet" href="css/app.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script type="text/javascript">
		function validate(myForm) {
			if(myForm.co_name.value == ""){
				alert("Company name can't be empty!");
				myForm.co_name.focus();
				return false;
			}
			if(myForm.OIB.value == ""){
				alert("OIB can't be empty!");
				myForm.OIB.focus();
				return false;
			}
			if(myForm.OIB.value.match(/^[0-9]+$/)==null || myForm.OIB.value.length<11){
				alert("OIB error");
				myForm.OIB.focus();
				return false;
			}
			if(myForm.rate.value.match(/^[0-9]+$/)==null || myForm.rate.value == ""){
				alert("Rate error (can't be empty or cointain other than numbers)");
				myForm.rate.focus();
				return false;
			}
			if(myForm.job_description.value == ""){
				alert("The job description can't be empty!");
				myForm.job_description.focus();
				return false;
			}
			return( true );
		}
		</script>
	</head>
<body>
	<h1>Welcome, {{ Auth::user()->name }}!</h1>
	<div class="ads">
		<hr>
		<a href="/test/public">Go back to the homepage</a><br><br>
		@foreach($ads as $ad)
			<form action="update" method="POST" class="form-inline" onsubmit="return validate(this)">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<p>Company name: <input type="text" class="form-control" name="co_name"/ value="{{ $ad->co_name }}"> OIB: <input type="text" class="form-control" maxlength="11" name="OIB"/ value="{{ $ad->OIB }}">
				Hourly rate: <input type="text" class="form-control" name="rate"/ value="{{ $ad->rate }}"></p>
				<p>Job description:</p>
				<textarea rows="5" class="form-control" style="min-width:100%" name="job_description"/>{{ $ad->job_description }}</textarea><br>
				<input type="hidden" name="id" value="{{ $ad->id }}">
				<br><span><input type="submit" class="btn btn-success" value="Update"/></span>
			</form>
		<a href="delete/{{ $ad->id }}">Delete</a><hr>
		@endforeach
	</div>
</body>
</html>
