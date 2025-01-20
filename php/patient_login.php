<?php
include 'connect.php';

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $socialAssurance = $_POST['socialAssurance'];

    $sql = "SELECT * FROM patients WHERE email='$email' AND password='$password' AND socialAssurance='$socialAssurance'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['email'] = $email;
        header('Location: patient_dashboard.php');
    } else {
        echo "Invalid Email, Password, or Social Assurance Number!";
    }
}

if (isset($_POST['signUp'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $birthdate = $_POST['birthdate'];
    $socialAssurance = $_POST['socialAssurance'];

    $checkEmail = "SELECT * FROM patients WHERE email='$email'";
    $result = $conn->query($checkEmail);

    if ($result->num_rows > 0) {
        echo "Email already exists!";
    } else {
        $insertQuery = "INSERT INTO patients (firstName, lastName, email, password, birthdate, socialAssurance) 
                        VALUES ('$firstName', '$lastName', '$email', '$password', '$birthdate', '$socialAssurance')";

        if ($conn->query($insertQuery) === TRUE) {
            header('Location: patient_login.php');
        } else {
            echo "Error: " . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <script>
        function toggleForm(formType) {
            if (formType === 'signup') {
                document.getElementById('signIn').style.display = 'none';
                document.getElementById('signup').style.display = 'block';
            } else {
                document.getElementById('signup').style.display = 'none';
                document.getElementById('signIn').style.display = 'block';
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <div class="form-toggle">
            <button onclick="toggleForm('signin')" id="loginBtn" class="btn active">Login</button>
            <button onclick="toggleForm('signup')" id="signupBtn" class="btn">Sign Up</button>
        </div>
    </div>


    <div class="container" id="signup" style="display:none;">
        <h1>Patient Registration</h1>
        <form method="POST" action="">
            <input type="text" name="fName" placeholder="First Name" required>
            <input type="text" name="lName" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="date" name="birthdate" placeholder="Birthdate" required>
            <input type="text" name="socialAssurance" placeholder="Social Assurance Number" required>
            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
    </div>

    <div class="container" id="signIn" style="display:block;">
        <h1>Patient Login</h1>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="socialAssurance" placeholder="Social Assurance Number" required>
            <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
    </div>
</body>
</html>
