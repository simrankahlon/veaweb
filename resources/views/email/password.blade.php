<!-- Password reset email.-->
<html>
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <h2>Password Reset</h2>
        <p>To reset your password, complete this form:
        {{ url('password/reset/'.$token) }} .
        </p>
        <p><br>
            Thanks,<br>Airvac Services.
        </p>
    </body>
</html>