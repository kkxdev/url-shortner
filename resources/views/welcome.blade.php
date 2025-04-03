<!DOCTYPE html>
<html>
<head>
    <title>URL Shortener</title>
</head>
<body>
<h1>URL Shortener</h1>
<form action="{{ route('shorten') }}" method="POST">
    @csrf
    <input type="text" name="original_url" placeholder="Enter URL" required>
    <button type="submit">Shorten</button>
</form>

@if(session('short_url'))
    <p>Your short URL: <a href="{{ session('short_url') }}">{{ session('short_url') }}</a></p>
@endif
</body>
</html>
