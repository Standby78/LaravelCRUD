<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CMG test app</title>
		<link rel="stylesheet" href="css/app.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	</head>
    <body>
	
	<div class="login-form" style="display:none">
		<form action="" method="POST" class="form-inline">
				Login: <input type="text" class="form-control" name="login" size="8"/> Password: <input type="text" class="form-control" size="8" name="pass"/>
				<span><input type="submit" class="btn btn-success" value="Login"/></span>
		</form>
	</div>
	<div style="text-align: left">
		<button class="btn-info btn-xs login-btn-space" id="login-more" onclick="$('.login-form').slideToggle(function(){$('#login-more').html($('.login-form').is(':visible')?'Discard':'Login');});">Login</button><br>
	</div>

	<div class="title">
		CMG Laravel CRUD
	</div>		  
	</div>

	<div class="form" style="display:none">
		<form action="" method="POST" class="form-inline">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<p>Company name: <input type="text" class="form-control" name="co_name"/> OIB: <input type="text" class="form-control" maxlength="11" name="OIB"/>
				 Hourly rate: <input type="text" class="form-control" name="rate"/></p>
				<p>Job description:</p>
				<textarea rows="5" class="form-control" style="min-width:100%" name="job_description"/>Enter job description here</textarea><br>
				<br><span><input type="submit" class="btn btn-success" value="Save"/></span>
		</form>
	</div>
	<div>
		<button class="btn-info btn-space" id="more" onclick="$('.form').slideToggle(function(){$('#more').html($('.form').is(':visible')?'Discard':'New Ad');});">New Ad</button>
	</div>
	<div>
		@yield('content')
	</div>
    </body>
</html>
