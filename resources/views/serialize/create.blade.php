@extends('layout.master')

@section ('content')

	<div class="container">
		<h1>Register here</h1>

		<form method="POST" action="/feed">
			@csrf
			<div class="form-group">
				<label for="first_name">First Name:</label>
				<input type="text" class="form-control" id="first_name" name="first_name" >
				@if ($errors->has('first_name'))
					<div class="error"><?php echo $errors->first('first_name'); ?></div>
				@endif
			</div>

			<div class="form-group">
				<label for="last_name">Last Name:</label>
				<input type="text" class="form-control" id="last_name" name="last_name" >
				@if ($errors->has('last_name'))
					<div class="error"><?php echo $errors->first('last_name'); ?></div>
				@endif
			</div>

			<div class="form-group">
				<label for="email">Email:</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php old('email') ?>">
				@if ($errors->has('email'))
					<div class="error"><?php echo $errors->first('email'); ?></div>
				@endif
			</div>

			<div class="form-group">
				<label for="password">Password:</label>
				<input type="password" id="password" class="form-control" name="password" >
				@if ($errors->has('password'))
					<div class="error"><?php echo $errors->first('password'); ?></div>
				@endif
			</div>

			<div class="form-group">
				<label for="password_confirmation">Password confirm:</label>
				<input type="password" id="password_confirmation" class="form-control" name="password_confirmation" >
			</div>

			<div class="form-group">
				<button type="submit" class="btn btn-primary">Register</button> 
			</div>
			{{-- <!-- @if ($errors->any())
            <div>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        	@endif --> --}}
		</form>
	</div>

@endsection