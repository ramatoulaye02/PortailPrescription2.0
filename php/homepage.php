<?php
session_start();
include("connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: ../index.php");
    exit();
}

echo "<h1>Welcome, " . $_SESSION['email'] . "</h1>";
echo "<a href='logout.php'>Logout</a>";
?>
