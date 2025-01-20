<?php
include 'connect.php';

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $medicalID = $_POST['medicalID'];

    $sql = "SELECT * FROM doctors WHERE email='$email' AND password='$password' AND medicalID='$medicalID'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['email'] = $email;
        header('Location: homepage.php');
    } else {
        echo "Invalid Email, Password, or Medical ID!";
    }
}

if (isset($_POST['signUp'])) {
    $firstName = $_POST['fName'];
    $lastName = $_POST['lName'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
    $medicalID = $_POST['medicalID'];

    $checkEmail = "SELECT * FROM doctors WHERE email='$email'";
    $checkMedicalID = "SELECT * FROM doctors WHERE medicalID='$medicalID'";

    $resultEmail = $conn->query($checkEmail);
    $resultMedicalID = $conn->query($checkMedicalID);

    if ($resultEmail->num_rows > 0) {
        echo "Email already exists!";
    } elseif ($resultMedicalID->num_rows > 0) {
        echo "Medical ID already exists!";
    } else {
        $insertQuery = "INSERT INTO doctors (firstName, lastName, email, password, medicalID) 
                        VALUES ('$firstName', '$lastName', '$email', '$password', '$medicalID')";

        if ($conn->query($insertQuery) === TRUE) {
            header('Location: doctor_login.php');
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
    <title>Doctor Login</title>
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
        <h1>Doctor Registration</h1>
        <form method="POST" action="">
            <input type="text" name="fName" placeholder="First Name" required>
            <input type="text" name="lName" placeholder="Last Name" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="medicalID" placeholder="Medical ID" required>
            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
    </div>

    <div class="container" id="signIn" style="display:block;">
        <h1>Doctor Login</h1>
        <form method="POST" action="">
            <input type="email" name="email" placeholder="Email" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="text" name="medicalID" placeholder="Medical ID" required>
            <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
    </div>
</body>
</html>
