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
	</head>

<body>
<div class="container">
	<div class="form-control-static">
		<strong>Registration form</strong><br><br>
	</div>

<form class="form-horizontal" role="form" method="POST" action="{{ route('register') }}">
{{ csrf_field() }}
	<div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
		<label for="name" class="col-md-5 control-label">Name</label>
		<div class="col-md-3">
			<input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
			@if ($errors->has('name'))
				<span class="help-block">
				<strong>{{ $errors->first('name') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
		<label for="email" class="col-md-5 control-label">E-Mail Address</label>
		<div class="col-md-3">
			<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
			@if ($errors->has('email'))
				<span class="help-block">
				<strong>{{ $errors->first('email') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
		<label for="password" class="col-md-5 control-label">Password</label>
		<div class="col-md-3">
			<input id="password" type="password" class="form-control" name="password" required>
			@if ($errors->has('password'))
				<span class="help-block">
				<strong>{{ $errors->first('password') }}</strong>
				</span>
			@endif
		</div>
	</div>
	<div class="form-group">
		<label for="password-confirm" class="col-md-5 control-label">Confirm Password</label>
		<div class="col-md-3">
			<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-md-3 col-md-offset-4">
			<button type="submit" class="btn btn-primary">Register</button>
		</div>
	</div>
</form>
<div>
	<br><a href="/test/public">Go back to homepage</a>
</div>
</div>
</body>
</html>
