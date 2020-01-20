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
<form action="{{ route('do-add-project') }}" method="post">
    <label>project Name</label>
    <input type="text" name="name">
    <br>
    <label>Status</label>

    <select name="status">
        <option value="done">Done</option>
        <option value="in progress">In Progress</option>
    </select>
    {{ csrf_field() }}
    <input type="submit" value="send">
</form>
</body>
</html>
