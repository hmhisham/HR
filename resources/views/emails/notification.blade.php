<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            font-size: 20px; /* Increased font size */
            line-height: 1.6;
            text-align: center;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        p {
            margin: 0;
            color: #333;
        }

        .email-content {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            display: inline-block;
            text-align: center;
            max-width: 600px;
            margin: 0 auto;
        }
    </style>
</head>

<body>
    <div class="email-content">
        <p>{{ $emailMessage ?? 'Default message' }}</p>
    </div>
</body>

</html>
