<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <p>You have got an email from <strong>{{ $validatedData['name'] }}</strong></p>
    <h3>Details</h3>
    <p>{{ $validatedData['message'] }}</p>
</body>
</html>
