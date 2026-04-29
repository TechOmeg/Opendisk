<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Projects</h2>

<form method="POST" action="/project">
    @csrf
    <input name="name" placeholder="Project Name">
    <button>Create</button>
</form>

<hr>

@foreach($projects as $project)
    <a href="/project/{{ $project->id }}">
        {{ $project->name }}
    </a>
    <br>
@endforeach
</body>
</html>