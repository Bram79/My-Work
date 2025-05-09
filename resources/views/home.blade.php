<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ asset('css/styleLaravel.css') }}">

</head>

<body>

    @include('nav')

    </form>

    @auth
        <div class="box">
            <h1>Congrats ur are logged in</h1>
            <form style="display: flex; justify-content: center;" action="/logout" method="POST">
                @csrf
                <button class="btn-small" type="submit">Log out</button>
            </form>
        </div>

        <div class="box">
            <h2>Create a New Post</h2>
            <form action="/create-post" method="POST">
                @csrf
                <input type="text" class="form-control" name="title" placeholder="post title">
                <textarea class="form-control" name="body" placeholder="body content..."></textarea>
                <button class="btn" type="submit">Submit Post</button>
            </form>
        </div>

        <div class="box">
            <h2>User posts</h2>
            @foreach($posts as $post)
                <div class="postBox">
                    <h3>{{$post['title']}} - by {{$post->user->name}}</h3>
                    {{$post['body']}}
                    <p class="btn-small"><a href="/edit-post/{{$post->id}}">Edit</a></p>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn-small" type="submit">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>

    @else
        <div class="box">
            <h1>Login</h1>
            <form action="/login" method="POST">
                @csrf
                <input name="loginName" class="form-control" type="text" placeholder="name">
                <input name="loginPassword" class="form-control" type="password" placeholder="password">
                <button class="btn" type="submit">Login</button>
            </form>
        </div>

        <div class="box">
            <h1>Register</h1>
            <form action="/register" method="POST">
                @csrf
                <input name="name" class="form-control" type="text" placeholder="name">
                <input name="email" class="form-control" type="text" placeholder="email">
                <input name="password" class="form-control" type="password" placeholder="password">
                <button class="btn" type="submit">Register</button>
            </form>
        </div>
        <div class="box">
            <h2>All posts</h2>
            @foreach($posts as $post)
                <div class="postBox">
                    <h3>{{$post['title']}} - by {{$post->user->name}}</h3>
                    {{$post['body']}}
                    @csrf
                </div>
            @endforeach
        </div>
    @endauth

</body>

</html>