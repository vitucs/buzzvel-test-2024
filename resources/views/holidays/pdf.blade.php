<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Holiday Plan</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin: 0 auto;
            padding: 20px;
            max-width: 600px;
            border: 1px solid #ddd;
        }
        h1 {
            text-align: center;
        }
        .details {
            margin-top: 20px;
        }
        .details p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>{{ $title }}</h1>
        <div class="details">
            <p><strong>Description:</strong> {{ $description }}</p>
            <p><strong>Date:</strong> {{ $date }}</p>
            <p><strong>Location:</strong> {{ $location }}</p>
            <p><strong>Participants:</strong> {{ $participants }}</p>
        </div>
    </div>
</body>
</html>
