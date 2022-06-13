@extends('student/master')

@section('title', 'Homepage')
@section('all-students', 'active')

@section('content')

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
    	<div class="container">
    		<div class="row">
    			<div class="col-8">
    				@if(session('message'))
					    <div class="alert alert-success">
					        {{ session('message') }}
					    </div>
					@endif
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-12">
					<table class="table table-striped" id="student_table">
					  <thead>
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Student Name</th>
					      <th scope="col">Email</th>
					      <th scope="col">Contact Number</th>
					      <th scope="col">Country</th>
					      <th scope="col">Action</th>
					    </tr>
					  </thead>
					  <tbody>
					  	@foreach($students as $st)
						    <tr>
						      <th scope="row">{{ $st->id }}</th>
						      <td>{{ $st->name }} 
						      	@if(!empty($st->profile_image))
					    			<img src="{{URL($st->profile_image)}}" alt="Profile pic" width="50" height="30">
					    		@endif
					    	  </td>
						      <td>{{ $st->email }}</td>
						      <td>+{{ $st->country_code.' '.$st->phone_number }}</td>
						      <td>{{ $st->country }}</td>
						      <td><a href="/student/edit/{{$st->id}}"><span>Edit</span></a>  &nbsp;&nbsp;<a href="/student/delete/{{$st->id}}"><span>Delete</span></a></td>
						    </tr>
						@endforeach
					    
					  </tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
<br>

<script>
	$("#edit").on('click', function(){
		console.log('clicked');
	})
	

	$(document).ready(function () {
	    $('#student_table').DataTable({});
	});
</script>



@endsection