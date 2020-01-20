<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>add project</title>
</head>
<body>
<form action="{{ route('do-edit-task', $data->id) }}" method="post">
    <label>Task Name</label>
    <input type="text" name="name" value="{{ $data->name }}">
    <br>
    <label>Project Name</label>

    <select name="project_id">
        @forelse($projects as $project)
            <option value="{{ $project->id }}" {{ $data->project_id == $project->id ? 'selected' : '' }}>{{ $project->name }}</option>
            @endforeach
    </select>

    <br>
    <label>User Name</label>

    <select name="user_id">
        @forelse($users as $user)
            <option value="{{ $user->id }}" {{ $data->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
            @endforeach
    </select>

    <br>
    <label>Status</label>

    <select name="status">
        <option value="done" {{ $data->status == 'done' ? 'selected' : '' }}>Done</option>
        <option value="in progress" {{ $data->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
    </select>
    <br>
    <input type="datetime" name="end_date" value="{{ $data->end_date }}">
    {{ csrf_field() }}
    <input type="submit" value="send">
</form>
</body>
</html>
