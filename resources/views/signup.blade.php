@extends('layout')

@section('content')

<!-- /app/views/signup.blade.php -->

<h1>Sign up</h1>

@foreach($errors->all() as $message)
	<div class='error'>{{ $message }}</div>
@endforeach

{{ Form::open(array('url' => '/signup')) }}

Email<br>
{{ Form::text('email') }}<br><br>

Password:<br>
{{ Form::password('password') }}<br><br>

{{ Form::submit('Submit') }}

{{ Form::close() }}

@stop