@include('header')
<style>
    .row {
        min-width: 80%;
    }
</style>
<div class="row">
    @foreach ($blogs as $blog)
    <div class="col-md-12">
        <a href="{{ route('blog', ['id' => $blog->id]) }}" class="product_card_link">
            <div>
                <h1>{{ $blog->title }}</h1>
                <p>{{ $blog->content }}</p>
                <p>Author: {{ $blog->author }}</p>
            </div>
        </a>
        @auth
            @if(auth()->user()->role == 1)
            <a class="text-warning" href="{{ url(route('post', ['id' => $blog->id, 'created_user' => $blog->created_user])) }}">update</a>
            <a class="text-danger" href="{{ url(route('delete-blog', ['id' => $blog->id, 'created_user' => $blog->created_user])) }}">update</a>
            @endif
        @endauth
    </div>
    @endforeach
</div>
@include('footer')