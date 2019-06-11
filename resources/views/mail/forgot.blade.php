

<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <style>
        h1, h4 {
            color: #ff4500;
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
                    <td>
                        <h2>Reset Your Password</h2>
                        <p> Thanks for having an account with the <a href="{{ env('CLIENT_URL') }}">{!! $site_name !!}</a>.
                            Please follow the link below to reset your account password.</p>
                        {!! $click_here !!}
                        <br/><br/>Or point your browser to this address:<br>
                        <strong>{!! $url !!}</strong><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        <br/>
                        Regards,<br/>
                        {!! $site_name !!}<br/>

                    </td>
                </tr>


            </table>
        </td>
    </tr>
</table>
</body>
</html>