@extends('layout')

@section('content')
<div class="jumbotron">
<div class="container">

{{ Form::open(array('url' => '/handleEdit'))}}

{{ Form::hidden('id',$task['id']); }}

<div class='form-group'>
{{ Form::label('name','Name') }}
{{ Form::text('name',$task['name']); }}
</div>
<div class='form-group'>
{{ Form::label('complete','Complete?') }}
{{ Form::checkbox('complete', $task['complete'] , $task['complete']); }}
{{ $task->complete ? 'checked' : '' }}
</div>


{{ Form::submit('Save'); }}

{{ Form::close() }}

</div>
</div>

@stop
