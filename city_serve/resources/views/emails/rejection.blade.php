<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>working Application Rejection</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            color: #333;
        }

        p {
            font-size: 16px;
            color: #555;
            line-height: 1.5;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Hi, {{ $mailData->name }}, we hope you're doing well!</h1>
        <p>We regret to inform you that your application for the working role has been rejected.</p>
        <p>We appreciate your interest in our organization and the time you invested in applying.</p>
        <p>Please don't be discouraged and consider applying for other opportunities with us in the future.</p>
        <p>Thank you for your understanding.</p>
        <p>Best regards,</p>
        <p>Shaghenli</p>
    </div>
</body>

</html>
