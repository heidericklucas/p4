@extends('layout')

@section('content')

<div class="jumbotron">
<div class="container">

<div class="page-header">
<h1>Activate New Task</h1>
</div>

{{ Form::open(array('url' => '/handleCreate')) }}

        <div class="form-group">
        <label for="title">Name</label>
        <input type="text" class="form-control" name="name" />
        </div>

        <div class="checkbox">
        <label for="complete">
        <input type="checkbox" name="complete" /> Complete?
        </label>

        </div>{{ Form::submit('Add') }}
        <a href="{{ url('/') }}" class="btn btn-link">Cancel</a>

{{ Form::close() }}


</div>
</div>

@stop
