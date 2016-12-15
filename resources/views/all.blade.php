@extends('layout')

@section('content')

<div class="jumbotron">
<div class="container">
<h1>Active Tasks</h1>

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

<div class="jumbotron" style="color:grey;">
<div class="container">
<h1>Deactivated Tasks</h1>
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
                @if ($task['complete'])
                
<tr>
                    <td>{{ $task['id'] }}</td>
                    <td><strong>{{ $task['name'] }}</strong></td>
                    <td>{{ $task['created_at'] }}</td>
                    <td>{{ $task['complete'] ? 'Yes' : 'No'}}</td>
                    <td>{{ $task['completed_at_time'] }}</td>
</tr>
                @endif
                @endforeach
</table>
</div>
</div>

@stop