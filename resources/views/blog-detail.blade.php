@include('header')
<style>
    .comment-container {
        min-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        border-radius: 5px;
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
<div class="row">
    <div class="col-md-12">
        <h1>{{ $blog->title }}</h1>
        <p>{{ $blog->content }}</p>
        <p>Author: {{ $blog->author }}</p>
    </div>
    <div class="col-md-12 mt-5">
        <h2>Comments:</h2>
        <div class="comment-container">
            <form action="/add-comment" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Content</label>
                    <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                    <input type="text" id="content" name="content" value="{{ old('content') }}" required>
                    @if ($errors->has('content'))
                    <div class="text-danger">{{ $errors->first('content') }}</div>
                    @endif
                </div>
                <button type="submit">Comment</button>
            </form>
        </div>
        <div class="row">
            @foreach ($comments as $comment)
            <p class="col-md-3">{{$comment->name}}</p>
            <p class="col-md-6">{{$comment->content}}</p>
            <p class="col-md-3">{{$comment->created_at}}</p>
            @endforeach
        </div>
    </div>
</div>
@include('footer')