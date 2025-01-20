<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: patient_login.php');
    exit();
}

include 'connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $patientEmail = $_SESSION['email'];
    $pharmacyId = $_POST['pharmacy_id'];
    $prescriptionName = $_POST['prescription_name'];

    // Get patient ID
    $patientQuery = $conn->prepare("SELECT id FROM patients WHERE email = ?");
    $patientQuery->bind_param("s", $patientEmail);
    $patientQuery->execute();
    $patientResult = $patientQuery->get_result();
    $patient = $patientResult->fetch_assoc();
    $patientId = $patient['id'];

    // Insert order into the database
    $orderQuery = $conn->prepare("INSERT INTO orders (patient_id, pharmacy_id, prescription_name) VALUES (?, ?, ?)");
    $orderQuery->bind_param("iis", $patientId, $pharmacyId, $prescriptionName);

    if ($orderQuery->execute()) {
        header('Location: patient_dashboard.php'); // Redirect back to the dashboard
    } else {
        echo "Error: " . $conn->error;
    }
}
?>
