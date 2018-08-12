<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>File</title>
</head>
<body>
    <form action="/file" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="file" name="document[]">
        <br>
        <br>
        <input type="file" name="document[]">
        <br>
        <br>
        <input type="file" name="document[]">
        <br>
        <br>
        <input type="file" name="document[]">
        <br>
        <br>
        <br>
        <button type="submit" name="submit"> UPLOAD </button>
    </form>
</body>
</html>