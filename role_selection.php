<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PrescriptionPortal</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container">
        <h1>PrescriptionPortal</h1>
        <form method="POST" action="php/role_redirect.php">
            <button name="role" value="patient">I'm a Patient</button>
            <button name="role" value="doctor">I'm a Doctor</button>
            <button name="role" value="pharmacy">We're a Pharmacy</button>
        </form>
    </div>
</body>
</html>
