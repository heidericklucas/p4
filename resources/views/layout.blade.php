<!doctype html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <title>Heid Task</title>
        <link href="http://netdna.bootstrapcdn.com/bootswatch/3.1.1/readable/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<header>
<!-- <div class="container"> -->

<table class="table table-striped">
<thead>
<tr>
        @if(Auth::check())
<th><a href='/logout'>Log out {{ Auth::user()->email }}</a></th>
<th><a href='/incomplete'>Active Tasks</a></th>
<th><a href='/create'>+ Add Tasks</a></th>
<th><a href='/completed'>Task Archive</a></th>
<th><a href='/all'>All Tasks</a></th>

        @else
        <th><a href='/signup'>Sign up</a> or <a href='/login'>Log in</a></th>
        @endif
</tr>
</thead>
</table>








<!-- </div > -->
            <div class="jumbotron">
              <div class="container">
<a href="/" ><h1>TASK BLASTER<h1></a>
<!-- <p><small><a href="/" >Incoming</a> / <href="/completed" >Outgoing</a> / <href="/all" >Full Horizon</a> </small></p> -->
              </div>
            </div>
    <div class="alert alert-block">
        @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif
</div>
</header>

@yield('content')


</body>
</html>
