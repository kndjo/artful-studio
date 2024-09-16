<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Your Details </title>
</head>
<body>
<h1>Welcome, {{ $client->firstname }} {{ $client->lastname }}!</h1>

<p>Your Client ID: {{ $client->id }}</p>
<p>Phone: {{ $client->phonenumber }}</p>

<p>If you have any questions, please don't hesitate to contact us.</p>

<p>Sincerely,</p>

<p>The Artful Studio Team</p>
</body>
</html>