<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
    <link rel="stylesheet" href="{{ asset('css/styleLaravel.css') }}">
</head>

<body>
    <div class="box">
        <h1>Edit Post</h1>
        <form action="/edit-post/{{$post->id}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" class="form-control" name="title" value="{{$post->title}}">
            <textarea name="body" class="form-control">{{$post->body}}</textarea>
            <button class="btn">Update Post</button>
        </form>
    </div>
</body>


</html>