@include('header')
<style>
	.post-container {
		min-width: 600px;
		margin: 0 auto;
		background-color: #fff;
		padding: 20px;
		box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		border-radius: 5px;
	}

	.register-container h2 {
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
	.form-group textarea {
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
<div class="post-container">
	<h2>{{ $blog ? "Add New " : "Update" }} Post</h2>
	<form action="/post" method="POST">
		@csrf
		@if ($errors->has('message'))
		<div class="text-danger">{{ $errors->first('message') }}</div>
		@endif
		<input type="hidden" id="id" name="id" value="{{ $blog ? $blog->id : 0 }}" required>
		<div class="form-group">
			<label for="title">Title</label>
			<input type="text" id="title" name="title" value="{{ $blog ? $blog->title : old('title') }}" required>
			@if ($errors->has('title'))
			<div class="text-danger">{{ $errors->first('title') }}</div>
			@endif
		</div>
		<div class="form-group">
			<label for="content">Content</label>
			<textarea id="content" name="content" rows="10" cols="50" required>{{ $blog ? $blog->content : old('content') }}</textarea>
			@if ($errors->has('content'))
			<div class="text-danger">{{ $errors->first('content') }}</div>
			@endif
		</div>
		<button type="submit">Save</button>
	</form>
</div>
@include('footer')