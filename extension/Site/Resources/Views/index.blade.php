

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        h1, h4 {
            color: #ff4500;
        }

        .header {
            border-bottom: 2px solid #ff4500;
            background-color: #fff;
            text-align: center;
        }

        .footer {
            border-top: 2px solid #1b6d85;
        }

        .footer > a {
            color: #ff4500;
        }

    </style>
</head>
<body>
<table width="100%">
    <tr>
        <td align="center">
            <table width="600">
                <tr>
                    <td class="header">

                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <h2>Welcome to Buddhaparkresidency</h2>
                    </td>
                </tr>
                <tr>
                    <td>
<a href="{{ env('CLIENT_URL') }}">Front-End</a>
                    </td>

                    <td>
                        <a href="{{ env('ADMIN_URL') }}" target="_blank">Back-End</a>
                    </td>

                </tr>
                

            </table>
        </td>
    </tr>
</table>
</body>
</html>