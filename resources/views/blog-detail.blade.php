<!DOCTYPE html>
<html>

<head>
    <title>User Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <header>
        <h1>{{ $blog->title }}</h1>
    </header>

    <main>
        <p>{{ $blog->content }}</p>
    </main>

    <footer>
        <p>&copy; 2023 User Name. All rights reserved.</p>
    </footer>

</body>

</html>