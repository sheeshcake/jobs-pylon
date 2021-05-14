<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pylon Invitation</title>
</head>
<body>
    <h1>Pylon invited you to take our exams</h1>
    <h6>please click this link to take the exam</h6>
    <form action="{{ route('takeexam') }}" method="GET">
        @csrf
        <input type="hidden" value="{{ $data['token'] }}" name="token">
        <input type="hidden" value="{{ $data['email'] }}" name="email">
        <input type="submit" class="M6CB1c yZqNl" value="Accept">
    </form>
</body>
</html>