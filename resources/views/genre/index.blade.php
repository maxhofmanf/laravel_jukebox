<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>dit is een totaal overzicht van alle genres</h1>
    <ul>
        @foreach ($genre as $genre)
            <li>{{ $genre->name }}<a href="genre/destroy/{{ $genre->id }}">x</a></li>
        @endforeach
    </ul>
</body>

</html>
