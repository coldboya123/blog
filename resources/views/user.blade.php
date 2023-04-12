@include('header')
<style>
    .row {
        min-width: 80%;
    }
</style>
<div class="row">
    <a class="text-success" href="{{ url('/post') }}">Add new post</a>
    @foreach ($blogs as $blog)
    <div class="col-md-12">
        <a href="{{ route('blog', ['id' => $blog->id]) }}" class="product_card_link">
            <div class="bg_white product_card rounded">
                <div class="product_card_body">
                    <h1>{{ $blog->title }}</h1>
                    <p>{{ $blog->content }}</p>
                    <a class="text-warning" href="{{ url(route('post', ['id' => $blog->id])) }}">update</a>
                    <a class="text-danger" href="{{ url(route('delete-blog', ['id' => $blog->id, 'created_user' => $blog->created_user])) }}">delete</a>
                </div>
            </div>
        </a>
    </div>
    @endforeach
</div>
@include('footer')