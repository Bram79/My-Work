<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div class="headerPage">
        <h4>Laravel page</h4>
        <div id="textFix">
            <form style="display: flex; justify-content: center;" action="/logout" method="POST">
                @csrf
                <button class="btn">Log out</button>
                <img src="{{ asset('images/Laravel.svg.png') }}" alt=":)">
        </div>
    </div>
</body>

</html>