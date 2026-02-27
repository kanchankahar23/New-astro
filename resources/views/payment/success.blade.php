<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecting...</title>
</head>
<body onload="window.location.href = '{{ $data['request']['redirectUrl'] }}'">
    <h1>Redirecting to payment page...</h1>
    <p>If you are not redirected automatically, <a href="{{ $data['request']['redirectUrl'] }}">click here</a>.</p>
</body>
</html>
