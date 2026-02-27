<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        @media only screen and (max-width: 600px) {
            .container {
                width: 100% !important;
                padding: 15px !important;
            }

            h2 {
                font-size: 20px !important;
            }

            table td {
                font-size: 14px !important;
            }
        }
    </style>
</head>

<body style="margin:0; padding:0; background:#f4f4f4; font-family: Arial, sans-serif;">

    <div class="container"
        style="max-width:600px; margin:0 auto; background:#ffffff; border-radius:10px;
               padding:25px; box-shadow:0 0 10px rgba(0,0,0,0.1);">

        <h2 style="text-align:center; color:#4A90E2; margin-bottom:10px;">
            New Appointment Created
        </h2>

        <p style="text-align:center; font-size:14px; color:#555; margin-top:0;">
            A new appointment has just been generated.
        </p>

        <hr style="border:0; border-top:1px solid #ddd; margin:20px 0;">

        <table style="width:100%; font-size:16px; color:#333;">
            <tr>
                <td style="padding:8px 0; font-weight:bold; width:150px;">Name:</td>
                <td style="padding:8px 0;">{{ $appointment->name }}</td>
            </tr>
            <tr>
                <td style="padding:8px 0; font-weight:bold;">Email:</td>
                <td style="padding:8px 0;">{{ $appointment->email }}</td>
            </tr>
            <tr>
                <td style="padding:8px 0; font-weight:bold;">Mobile:</td>
                <td style="padding:8px 0;">{{ $appointment->mobile }}</td>
            </tr>
        </table>

        <hr style="border:0; border-top:1px solid #ddd; margin:25px 0;">

        <p style="font-size:14px; color:#777; text-align:center;">
            This is an automated message from <strong>Your Company</strong>.
        </p>

    </div>

</body>

</html>
