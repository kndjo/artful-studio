<!DOCTYPE html>
<html>
<head>
    <title>Appointment Confirmation</title>
</head>
<body>

    <h1>You have booked an appointment!</h1>

    <h2>Dear {{ $appointment->client->firstname }} {{ $appointment->client->lastname }},</h2>

    <p>Your appointment has been successfully created.</p>

    <p><strong>Appointment Details:</strong></p>
    <ul>
        <li>Date: {{ $appointment->date }}</li>
        <li>Time: {{ $appointment->time }}</li>
        <li>Status: {{ $appointment->status }}</li>
    </ul>

    <p>Please confirm your appointment.</p>

    <br>Thanks,<br>
    Artdul Studio Team

</body>
</html>
