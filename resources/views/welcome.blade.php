<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>CMG test app</title>
		<link rel="stylesheet" href="css/app.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		<script>
		function validate() {
			if(document.myForm.co_name.value == ""){
				alert("Company name can't be empty!");
				document.myForm.co_name.focus();
				return false;
			}
			if(document.myForm.OIB.value == ""){
				alert("OIB can't be empty!");
				document.myForm.OIB.focus();
				return false;
			}
			if(document.myForm.OIB.value.match(/^[0-9]+$/)==null || document.myForm.OIB.value.length<11){
				alert("OIB error");
				document.myForm.OIB.focus();
				return false;
			}
			if(document.myForm.rate.value.match(/^[0-9]+$/)==null || document.myForm.rate.value == ""){
				alert("Rate error (can't be empty or cointain other than numbers)");
				document.myForm.rate.focus();
				return false;
			}
			if(document.myForm.job_description.value == ""){
				alert("The job description can't be empty!");
				document.myForm.job_description.focus();
				return false;
			}
			return( true );
		}
		</script>
	</head>
    <body>
	<div class="title">
		CMG Laravel CRUD
	</div>		  
	<div class="login-form" style="display:none">
		<form action="http://localhost/test/public/login" role="form"  method="POST" class="form-inline">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<label class="sr-only" for="inputEmail">Email</label> <input id="email" type="email" class="form-control input-sm" name=" email" placeholder="Email" size="8"/>
				<label class="sr-only" for="inputPassword">Password</label><input id="password" type="password" class="form-control input-sm" placeholder="Password" size="8" name="password"/>
				<span><input type="submit" class="btn btn-success btn-sm" value="Login"/></span>
		</form>
	</div>
		<div style="text-align: left">
		@if(Auth::check())
		Welcome, {{ Auth::user()->name }}.
		To edit your posts click <a href="edit" class="">here</a>.<br>
		<a href="test/public/logout/" class="btn">Logout</a>
		@else
		<div class="btn-group">	 
			<a class="btn btn-default btn-xs login-btn-space" id="login-more" onclick="$('.login-form').slideToggle(function(){$('#login-more').html($('.login-form').is(':visible')?'Discard':'Login');});"> Login </a>
			<a class="btn btn btn-default btn-xs login-btn-space" href="register">Register</a>
		</div>
		@endif
			<hr>
		</div>

	<div class="form" style="display:none" onsubmit="return(validate());">
		<form name="myForm" action="" method="POST" class="form-inline">
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
				<p>Company name: <input type="text" class="form-control" name="co_name"/> OIB: <input type="text" class="form-control" maxlength="11" name="OIB"/>
				 Hourly rate: <input type="text" class="form-control" name="rate"/></p>
				<p>Job description:</p>
				<textarea rows="5" class="form-control" style="min-width:100%" name="job_description"/>Enter job description here</textarea><br>
				<br><span><input type="submit" class="btn btn-success" value="Save"/></span>
		</form>
	</div>
	@if(Auth::check())
	<div>
		<button class="btn btn-default login-btn-space" id="more" onclick="$('.form').slideToggle(function(){$('#more').html($('.form').is(':visible')?'Discard':'New Ad');});">New Ad</button>
	</div>
	@endif
	<div>
		@yield('content')
	</div>
    </body>
</html>
