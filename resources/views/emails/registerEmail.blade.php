<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome To Eat The Book</title>
</head>
<body>
    <h1>안녕 {{ $user->name }}. Eat The Book 서점에 오신 것을 환영합니다</h1>
    <p>Eat The Book 플랫폼에 등록해 주셔서 감사합니다</p>
    <p>다음은 데이터 세부 정보입니다 :</p>
    <p><strong>Name :</strong>{{ $user->name }}</p>
    <p><strong>Email :</strong>{{ $user->email }}</p>
</body>
</html>
