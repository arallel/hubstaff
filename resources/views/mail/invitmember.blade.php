<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml"
    xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="x-apple-disable-message-reformatting">
    <title></title>

    <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
    <!-- Web Font / @font-face : BEGIN -->
    <!--[if mso]>
        <style>
            * {
                font-family: 'Roboto', sans-serif !important;
            }
        </style>
    <![endif]-->

    <!--[if !mso]>
        <link href="https://fonts.googleapis.com/css?family=Roboto:400,600" rel="stylesheet" type="text/css">
    <![endif]-->

    <!-- Web Font / @font-face : END -->

    <!-- CSS Reset : BEGIN -->


    <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            font-family: 'Roboto', sans-serif !important;
            font-size: 14px;
            margin-bottom: 10px;
            line-height: 24px;
            color: #8094ae;
            font-weight: 400;
        }

        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            margin: 0;
            padding: 0;
        }

        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        table table table {
            table-layout: auto;
        }

        a {
            text-decoration: none;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        .btn {
            background-color: transparent;
            border-radius: 4px;
            color: #2aa7ff;
            display: inline-block;
            font-size: 13px;
            font-weight: 600;
            line-height: 44px;
            text-align: center;
            text-decoration: none;
            text-transform: uppercase;
            padding: 0 30px;
            border: 2px solid #2aa7ff;
        }

        .btn:hover {
            /* Styling for the button on hover */
            background-color: #2aa7ff;
            color: white;
        }
    </style>

</head>

<body width="100%"
    style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #f5f6fa;">
    <center style="width: 100%; background-color: #f5f6fa;">
        <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#f5f6fa">
            <tr>
                <td style="padding: 40px 0;">
                    <table style="width:100%;max-width:620px;margin:0 auto;">
                        <tbody>
                            <tr>
                                <td style="text-align: left; padding-bottom:0px">
                                    <a href="#"><img style="height: 150px; width: 150px;"
                                            src="{{ asset('images/hubstaff-logo.png') }}" alt="logo"></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
                        <tbody>
                            <tr>
                                <td style="padding: 30px 30px 15px 30px;">
                                    <div class="card">
                                        <h4 style="font-size: 18px; color: black; font-weight: 600; margin: 0;">{{ $invitational->company }} is using Hubstaff to track time for their company.</h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0 30px 20px">
                                    <p style="margin-bottom: 10px;">This email is being sent to you because {{ $invitational->company }} is using
                                        Hubstaff to track time and projects /
                                        work orders and they've invited you into {{ $invitational->company }}.</p>
                                    <p style="margin-bottom: 10px;">Hubstaff makes it easy for virtual teams to work
                                        more efficiently by tracking time and
                                        projects / work orders. Over 8,000 remote teams use it daily</p>
                                    <a href="{{ url('http://127.0.0.1:8000/invitation/' . $invitational->token . '/' . $invitational->company) }}" class="btn">Accept
                                        Invite</a>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0 30px">
                                    <p style="margin-bottom: 10px;">You can also copy and paste the below link into your
                                        browser
                                        address bar.</p>
                                    <a
                                        href="{{ url('http://127.0.0.1:8000/invitation/' . $invitational->token . '/' . $invitational->company) }}">{{ url('http://127.0.0.1:8000/invitation/' . $invitational->token . '/' . $invitational->company) }}</a><br>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 20px 30px 40px">
                                    What is Hubstaff? Here's a quick guide to get you started - 
                                    <a
                                        href="http://support.hubstaff.com/quick-start-guide-for-new-users/">http://support.hubstaff.com/quick-start-guide-for-new-users/</a>
                                    </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </center>
</body>

</html>
