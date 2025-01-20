<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'];
    switch ($role) {
        case 'patient':
            header('Location: patient_login.php');
            break;
        case 'doctor':
            header('Location: doctor_login.php');
            break;
        case 'pharmacy':
            header('Location: pharmacy_login.php');
            break;
        default:
            header('Location: ../role_selection.php');
    }
}
?>
