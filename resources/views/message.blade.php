@extends('master')

@section('title', $message->title)

@section('content')


	messages:

	<ul>
		<li> <strong>{{ $message->title }}</strong> <br>
		 {{ $message->content }} <br>
		 {{ $message->created_at->diffForHumans() }}

		</li>
	</ul>


@endsection