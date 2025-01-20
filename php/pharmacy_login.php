<?php
include 'connect.php';

if (isset($_POST['signIn'])) {
    $storeID = $_POST['storeID'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM pharmacies WHERE storeID='$storeID' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $_SESSION['storeID'] = $storeID;
        header('Location: pharmacy_dashboard.php');
    } else {
        echo "Invalid Store ID or Password!";
    }
}

if (isset($_POST['signUp'])) {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $storeID = $_POST['storeID'];
    $password = md5($_POST['password']);

    $checkStoreID = "SELECT * FROM pharmacies WHERE storeID='$storeID'";
    $result = $conn->query($checkStoreID);

    if ($result->num_rows > 0) {
        echo "Store ID already exists!";
    } else {
        $insertQuery = "INSERT INTO pharmacies (name, address, storeID, password) VALUES ('$name', '$address', '$storeID', '$password')";

        if ($conn->query($insertQuery) === TRUE) {
            header('Location: pharmacy_login.php');
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

    <title>Pharmacy Login</title>
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
        <h1>Pharmacy Registration</h1>
        <form method="POST" action="">
            <input type="text" name="name" placeholder="Pharmacy Name" required>
            <input type="text" name="address" placeholder="Store Address" required>
            <input type="text" name="storeID" placeholder="Store ID" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" class="btn" value="Sign Up" name="signUp">
        </form>
    </div>

    <div class="container" id="signIn" style="display:block;">
        <h1>Pharmacy Login</h1>
        <form method="POST" action="">
            <input type="text" name="storeID" placeholder="Store ID" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" class="btn" value="Sign In" name="signIn">
        </form>
    </div>
</body>
</html>
