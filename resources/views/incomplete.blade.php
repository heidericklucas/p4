@extends('layout')

@section('content')

<div class="jumbotron">
<div class="container">
<table class="table table-striped">
<thead>
<tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Created at</th>
                    <th>Complete?</th>
                    <th>Completed at</th>
</tr>
</thead>
<tbody>
                @foreach($tasks as $task)
                @if ($task['complete']==0)
<tr>
                    <td>{{ $task['id'] }}</td>
                    <td><strong>{{ $task['name'] }}</strong></td>
                    <td>{{ $task['created_at'] }}</td>
                    <td>{{ $task['complete'] ? 'Yes' : 'No'}}</td>
                    <td><a href="edit/{{$task['id']}}" class="btn btn-default">Edit</a></td>
</tr>
                @endif
                @endforeach
</table>
</div>
</div>

@stop