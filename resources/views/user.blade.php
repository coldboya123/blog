<!DOCTYPE html>
<html>

<head>
    <title>User Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <h1>User Name</h1>
    </header>

    <main>
        <ul>
            @foreach ($blogs as $blog)
            <li><a href="{{ url(route('blog', ['id' => $blog->id])) }}">{{ $blog->title }}</a> <a href="{{ url(route('post', ['id' => $blog->id])) }}">update</a><a href="{{ url(route('delete-blog', ['id' => $blog->id])) }}">delete</a></li>
            @endforeach
        </ul>
        <a href="{{ url('/post') }}">Post Blog</a>
    </main>

    <footer>
        <p>&copy; 2023 User Name. All rights reserved.</p>
    </footer>

</body>

</html>