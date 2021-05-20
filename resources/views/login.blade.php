<!DOCTYPE html>
<html>
<head>
	@include('header')
	<title>Login </title>
</head>
<body>
<form action="{{ url('/logins') }}" method="POST">
	@csrf
	@if(session('error_message'))
	<div class="text-danger">{{session('error_message')}}</div>
	@endif
	<input type="text" name="email">
	<input type="text" name="pwd">
	<button type="submit">Save</button>
</form>
</body>
</html>