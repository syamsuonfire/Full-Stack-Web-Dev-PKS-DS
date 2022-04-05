<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your OTP Code</title>
</head>
<body>
    <p>"Halo {{$user->name}}, ini adalah kode OTP Anda : {{$user->otpCode->otp}}. Kode OTP ini berlaku 5 menit. Jangan berikan kode ini kepada siapapun."</p>
</body>
</html>
