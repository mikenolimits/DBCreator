<!doctype html>
<html lang="en">
<head>


</head>
<body>
    <div>
        {{ Form::open(['route' => 'db.store'])}}

           {{ Form::submit('Make New Database') }}
        {{ Form::close() }}
    </div>
</body>
</html>
