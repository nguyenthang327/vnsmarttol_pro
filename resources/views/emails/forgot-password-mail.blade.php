<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h3>{{trans('language.otp_code')}}: {{ isset($code) ? $code : '' }}</h3>
    <p>{{trans('language.otp_used_in', ['num' => config('constants.time_expires_at')])}}</p>
</body>
</html>