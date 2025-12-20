<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Posts</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 16px; }
        .row { display: flex; gap: 12px; align-items: center; justify-content: space-between; }
        .card { border: 1px solid #ddd; border-radius: 10px; padding: 14px; margin: 12px 0; }
        .muted { color: #666; font-size: 14px; }
        a.button, button { background: #111; color: #fff; border: 0; padding: 10px 14px; border-radius: 8px; text-decoration: none; cursor: pointer; }
        a.button.secondary { background: #444; }
        a.link { color: #111; }
        .flash { background: #e7f7ee; border: 1px solid #bfe6cf; padding: 10px 12px; border-radius: 8px; margin-bottom: 14px; }
        form { margin: 0; }
    </style>
</head>
<body>

<div class="row">
    <h1>Posts</h1>
    <a class="button" href="{{ route('posts.create') }}">+ New Post</a>
</div>

@if (session('status'))
    <div class="flash">{{ session('status') }}</div>
@endif

@foreach ($posts as $post)
    <div class="card">
        <div class="row">
            <div>
                <div><strong>{{ $post->title }}</strong></div>
                <div class="muted">#{{ $post->id }} · {{ $post->created_at->diffForHumans() }}</div>
            </div>

            <div style="display:flex; gap:10px;">
                <a class="button secondary" href="{{ route('posts.edit', $post) }}">Edit</a>

                <form method="POST" action="{{ route('posts.destroy', $post) }}"
                      onsubmit="return confirm('Delete this post?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        </div>

        @if ($post->body)
            <p>{{ $post->body }}</p>
        @endif
    </div>
@endforeach

{{ $posts->links() }}

</body>
</html>
