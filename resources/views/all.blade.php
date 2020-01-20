<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Projects</title>
</head>
<body>
@if(count($data) > 0)
<table border="2">
    <tr>
        <td> name</td>
        <td>status</td>
        <td>created by</td>
        <td>Done %</td>
        <td>edit</td>
        <td>delete</td>
    </tr>

        @foreach($data as $item)
        <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ $item->u_name }}</td>
            <td>{{ getDone($item->id) }} %</td>
            <td><a href="{{ route('project-edit', $item->id) }}">edit</a></td>
            <td><a href="{{ route('project-delete', $item->id) }}">delete</a></td>
        </tr>
        @endforeach

</table>
@else
<p>No Data Found</p>
@endif
</body>
</html>
