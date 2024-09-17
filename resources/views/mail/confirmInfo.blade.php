<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Confirm Your Details </title>
</head>
<img class="navbar-brand" src="https://img.freepik.com/free-vector/vintage-tattoo-studio-logo-with-rose-vector-illustration-black-white-flower-with-tape_74855-11255.jpg?t=st=1726398447~exp=1726402047~hmac=1e8af3462e5f82535dcf9737476355cc5af171e7313d72d3763ec68352a14119&w=740" alt="Artful Studio Logo" style="width: 25mm; height: 25mm;">

<body>
<h1>Welcome, {{ $client->firstname }} {{ $client->lastname }}!</h1>

<p>Your Client ID: {{ $client->id }}</p>
<p>Phone: {{ $client->phonenumber }}</p>

<p>If you have any questions, please don't hesitate to contact us.</p>

<p>Sincerely,</p>

<p>The Artful Studio Team</p>
</body>
</html>