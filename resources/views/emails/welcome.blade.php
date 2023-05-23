<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Welcome Email</title>
</head>
<body>
    <h1>Welcome, {{ $firstName }} {{ $lastName }}</h1>
    <p>Email: {{ $email }}</p>
    <p>Phone: {{ $phone }}</p>
    <p>Message: {{ $message }}</p>
</body>
</html>