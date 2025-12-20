<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>Create Post</title>
    <style>
        body { font-family: system-ui, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 16px; }
        label { display:block; margin-top: 14px; font-weight: 600; }
        input, textarea { width: 100%; padding: 10px; border-radius: 8px; border: 1px solid #ddd; }
        .row { display:flex; gap: 10px; margin-top: 16px; }
        a.button, button { background:#111; color:#fff; border:0; padding:10px 14px; border-radius:8px; text-decoration:none; cursor:pointer; }
        a.button.secondary { background:#444; }
        .errors { background:#ffecec; border:1px solid #f5b5b5; padding:10px 12px; border-radius:8px; margin: 14px 0; }
    </style>
</head>
<body>

<h1>Create Post</h1>

@if ($errors->any())
    <div class="errors">
        <strong>Fix these:</strong>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('posts.store') }}">
    @csrf

    <label>Title</label>
    <input name="title" value="{{ old('title') }}" required>

    <label>Body</label>
    <textarea name="body" rows="6">{{ old('body') }}</textarea>

    <div class="row">
        <button type="submit">Create</button>
        <a class="button secondary" href="{{ route('posts.index') }}">Cancel</a>
    </div>
</form>

</body>
</html>
