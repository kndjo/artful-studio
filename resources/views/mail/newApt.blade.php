<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Appointment Confirmation</title>
</head>
<body>
    <h1>You have booked an appointment!</h1>

    <p><strong>Appointment Details:</strong></p>
    <p>Date: {{ $appointment->date }}</p>
    <p>Time: {{ $appointment->time }}</p>
    <p>Status: {{ $appointment->status }}</p>
    <p> <br>Thanks,<br>
        Artful Studio Team</p>

</body>
</html>