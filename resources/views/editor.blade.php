<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>{{ $project->name }}</h2>

<select id="file">
    @foreach($project->files as $file)
        <option value="{{ $file->id }}">
            {{ $file->name }}
        </option>
    @endforeach
</select>

<br><br>

<textarea id="code" style="width:50%;height:300px;">
{{ $project->files[0]->content }}
</textarea>

<button onclick="save()">Save</button>

<h3>Preview</h3>
<iframe id="preview" style="width:50%;height:300px;"></iframe>

<script>
let currentFile = {{ $project->files[0]->id }};

document.getElementById('file').onchange = function () {
    currentFile = this.value;
};

function save() {
    let content = document.getElementById('code').value;

    fetch('/save', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            file_id: currentFile,
            content: content
        })
    });

    document.getElementById('preview').srcdoc = content;
}

// initial preview
document.getElementById('preview').srcdoc =
document.getElementById('code').value;
</script>
</body>
</html>