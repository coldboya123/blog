@include('header')
<style>
	.user-container {
		min-width: 600px;
		margin: 0 auto;
		background-color: #fff;
		padding: 20px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		border-radius: 5px;
	}

	.user-container h2 {
		margin-bottom: 20px;
		text-align: center;
		font-size: 24px;
	}

	.form-group {
		margin-bottom: 20px;
	}

	.form-group label {
		display: block;
		margin-bottom: 5px;
		font-size: 18px;
		font-weight: 600;
		color: #555;
	}

	.form-group input[type="text"],
	.form-group input[type="email"],
	.form-group input[type="password"] {
		width: 100%;
		padding: 10px;
		font-size: 16px;
		border-radius: 5px;
		border: 1px solid #ddd;
	}

	button[type="submit"] {
		display: block;
		width: 100%;
		padding: 10px;
		background-color: #007bff;
		color: #fff;
		border: none;
		border-radius: 5px;
		font-size: 18px;
		cursor: pointer;
	}

	button[type="submit"]:hover {
		background-color: #0062cc;
	}
</style>

<div class="user-container">
	<h2 style="color: black;">{{$user ? "Update" : "Create new"}} User</h2>
	<form action="/modify-user" method="POST">
		@csrf
		<div class="form-group">
			<label for="name">Name</label>
			<input type="hidden" name="id" value="{{$user ? $user->id : 0}}">
			<input type="text" id="name" name="name" value="{{ $user ? $user->name : old('name') }}" required>
			@if ($errors->has('name'))
			<div class="text-danger">{{ $errors->first('name') }}</div>
			@endif
		</div>
		<div class="form-group">
			<label for="email">Email</label>
			<input type="email" id="email" name="email" value="{{ $user ? $user->email : old('email') }}" required>
			@if ($errors->has('email'))
			<div class="text-danger">{{ $errors->first('email') }}</div>
			@endif
		</div>
		<div class="form-group">
			<label for="password">Password</label>
			<input type="password" id="password" name="password" value="{{ old('password') }}" required>
			@if ($errors->has('password'))
			<div class="text-danger">{{ $errors->first('password') }}</div>
			@endif
		</div>
		<div class="form-group">
			<label for="role">Role as admin</label>
			<input type="checkbox" id="role" name="role" {{ $user ? ($user->role==1 ? 'checked' : '') : '' }}>
		</div>
		<button type="submit">{{$user ? "Update" : "Create"}}</button>
	</form>
</div>
@include('footer')