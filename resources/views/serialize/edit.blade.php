@extends('layout.master')

@section ('content')
    <div class="container">
        <p>
            <a href="/users">back</a>
        </p>
        <p>
            <a href="/users">home</a>
        </p>
        <h1>edit user</h1>
        <form action="/users/{{ $user->id }}" method="POST">
            @method('PATCH')
            @csrf
            <div class="form-group">
                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $edit_user['first_name'] }}">
                @if ($errors->has('first_name'))
                    <div class="error"><?php echo $errors->first('first_name'); ?></div>
                @endif
            </div>
    
            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ $edit_user['last_name'] }}">
                @if ($errors->has('last_name'))
                    <div class="error"><?php echo $errors->first('last_name'); ?></div>
                @endif
            </div>
    
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $edit_user['email'] }}">
                @if ($errors->has('email'))
                    <div class="error"><?php echo $errors->first('email'); ?></div>
                @endif
            </div>

            <div class="form-group">
				<label for="password">Password:</label>
				<input type="password" id="password" class="form-control" name="password" value="{{ $edit_user['password'] }}">
				@if ($errors->has('password'))
					<div class="error"><?php echo $errors->first('password'); ?></div>
				@endif
			</div>

            <div>
                <button type="submit">update user</button>
            </div>
        </form>
    </div>
    {{-- <form action="/users/{{ $user->id }}" method="POST">
        @method('DELETE')
        @csrf
        <div>
            <button type="submit">delete user</button>
        </div>
    </form> --}}
@endsection