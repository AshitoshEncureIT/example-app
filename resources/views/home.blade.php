@extends('master')

@section('title', 'Homepage')

@section('content')

	Post a message:

	<form action="/create" method="post">
		<input type="text" name="title" placeholder="title">
		<input type="text" name="content" placeholder="content">
		{{ csrf_field() }}
		<button type="submit">Post</button>
	</form>
<br>

	Recent messages:

	<ul>
		@foreach($messages as $msg)
		<li> <strong>{{ $msg->title }}</strong> <br>
		 {{ $msg->content }} <br>
		 {{ $msg->created_at->diffForHumans() }}<br>

		 <a href="/message/{{$msg->id}}">view</a>

		</li>
		@endforeach
	</ul>


@endsection