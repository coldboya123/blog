<!DOCTYPE html>
<html>

<head>
	<title>Blog Post Form</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body>
	<h1>Create a new blog post</h1>
	@if ($errors->has('message'))
	<div class="text-danger">{{ $errors->first('message') }}</div>
	@endif
	<form action="/post" method="POST">
		@csrf
		<label for="title">Title:</label>
		<input type="hidden" name="id" value="{{$blog ? $blog->id : 0}}">
		<input type="text" id="title" name="title" value="{{ $blog ? $blog->title : old('title') }}" required><br><br>
		@if ($errors->has('title'))
		<div class="text-danger">{{ $errors->first('title') }}</div>
		@endif

		<label for="content">Content:</label>
		<textarea id="content" name="content" rows="10" cols="50" required>{{ $blog ? $blog->content : old('content') }}</textarea><br><br>
		@if ($errors->has('content'))
		<div class="text-danger">{{ $errors->first('content') }}</div>
		@endif
		<button type="submit">{{$blog ? "Update" : "Post"}}</button>
	</form>
</body>

</html>