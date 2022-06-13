@extends('student/master')

@section('title', 'Add Student')

@section('content')

			
	<div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto">
			<div class="container">
    		<div class="row">
    			<h2>Edit Student Details</h2>
    		</div>

    	</div>
    	<div class="container">
    		<div class="row">
    			<div class="col-8">
    				
					<form id="student-form" method="post" action="{{'/student/update_student'}}" enctype="multipart/form-data">
						{{ csrf_field() }}
						<div class="form-group row">
					    <label class="col-sm-2 col-form-label">Name</label>
						    <div class="col-sm-10 error_div">
						    	<input type="text" class="form-control" name="student_name" id="student_name" placeholder="Enter Full name" value="{{$student->name}}">
						    </div>
					    </div>

					  <div class="form-group row">
					    <label class="col-sm-2 col-form-label">Country Code</label>
					    <div class="col-sm-10 error_div">
					    	<input type="number" class="form-control" name="country_code" id="country_code" placeholder="Enter country code" value="{{$student->country_code}}">
					    </div>
					  </div>

					  <div class="form-group row">
					    <label class="col-sm-2 col-form-label">Phone Number</label>
					    <div class="col-sm-10 error_div">
					    	<input type="number" class="form-control" name="phone_number" id="phone_number" placeholder="Enter Phone number" value="{{$student->phone_number}}">
					    </div>
					  </div>


					  <div class="form-group row">
					    <label class="col-sm-2 col-form-label">Email address</label>
					    <div class="col-sm-10 error_div">
					    	<input type="email" class="form-control" name="email" id="email" placeholder="Enter email" value="{{$student->email}}">
					    </div>
					  </div>

					  <div class="form-group row">
					    <label class="col-sm-2 col-form-label">Country</label>
					    <div class="col-sm-10 error_div">
					    	<input type="text" class="form-control" name="country" id="country" placeholder="Enter country" value="{{$student->country}}">
					    </div>
					  </div>

					  <div class="form-group row">
					    <label class="col-sm-2 col-form-label">Profile Image</label>
					    <div class="col-sm-10 error_div">
					    	<input type="file" class="form-control" name="profile_image" id="profile_image">
								@error('profile_image')
									<div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
								@enderror
					    	<br>

					    	@if(!empty($student->profile_image))
					    		<img src="{{URL($student->profile_image)}}" alt="Profile pic" width="50" height="60">
					    	@endif

					    	
					    </div>
					  </div>



					  <input type="hidden" name="id" value="{{$student->id}}">

					  <button type="submit" class="btn btn-primary">Update</button>
					  <a href="/student"><button type="button" class="btn btn-danger">Cancel</button></a>
					</form>
				</div>
			</div>
		</div>
	</div>
<br>

<script>
	$('#student-form').validate({
      rules: {
        student_name: {
          required: true
        },
        country_code: {
          required: true
        },
        phone_number: {
          required: true
        },
        email: {
          required: true,
          email:true
        },
        country: {
          required: true
        }
      },
      messages: {
      	student_name: {
          required: 'Please enter Student name'
        },
        country_code: {
          required: 'Please enter country code'
        },
        phone_number: {
          required: 'Please add phone number'
        },
        email: {
          required: 'Please enter Email',
          email:'Please enter valid Email'
        },
        country: {
          required: 'Please enter country'
        }
      },
      errorElement: 'span',
      errorPlacement: function (error, element) {
        error.addClass('invalid-feedback');
        element.closest('.error_div').append(error);
      },
      highlight: function (element, errorClass, validClass) {
        $(element).addClass('is-invalid');
      },
      unhighlight: function (element, errorClass, validClass) {
        $(element).removeClass('is-invalid');
      }
    });
</script>

@endsection