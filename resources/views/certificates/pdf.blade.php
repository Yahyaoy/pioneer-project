<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Certificate of Participation</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;700&family=Playfair+Display:wght@700&display=swap');

        body {
            font-family: 'Montserrat', 'DejaVu Sans', sans-serif;
            background-color: #f9f9f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .certificate-box {
            border: 15px solid #f0e6d2;
            padding: 60px 80px;
            max-width: 800px;
            background-color: #fff;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            position: relative;
            text-align: center;
        }

        .certificate-box::before {
            content: "";
            position: absolute;
            top: 20px;
            left: 20px;
            right: 20px;
            bottom: 20px;
            border: 2px solid #d4af37;
            pointer-events: none;
        }

        h1 {
            font-family: 'Playfair Display', serif;
            font-size: 36px;
            margin-bottom: 30px;
            color: #2c3e50;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        h2 {
            font-size: 28px;
            margin: 25px 0;
            color: #d4af37;
            font-weight: 600;
            padding: 10px 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }

        p {
            font-size: 18px;
            line-height: 1.6;
            margin: 15px 0;
        }

        strong {
            color: #2c3e50;
            font-weight: 600;
        }

        .footer {
            margin-top: 50px;
            font-size: 16px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }

        .footer p {
            margin: 5px 0;
        }

        @media print {
            body {
                background-color: white;
            }

            .certificate-box {
                border: 15px solid #f0e6d2;
                box-shadow: none;
            }
        }
    </style>
</head>
<body>
<div class="certificate-box">
    <h1>Certificate of Participation</h1>
    <p>This is to certify that</p>
    <h2>{{ $user->name }}</h2>
    <p>has successfully participated in the initiative <strong>{{ $initiative->name }}</strong></p>
    <p>with a rating of: <strong>{{ $rating }}</strong></p>
    <p>Issued on: {{ $date }}</p>
    <div class="footer">
        <p>Issued by: {{ $owner }}</p>
    </div>
</div>
</body>
</html>
