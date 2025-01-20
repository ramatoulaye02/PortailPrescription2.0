<?php
session_start();
if (!isset($_SESSION['storeID'])) {
    header('Location: pharmacy_login.php'); // Redirect to login if not logged in
    exit();
}

$storeID = $_SESSION['storeID'];
include 'connect.php';

// Fetch pharmacy ID
$pharmacyQuery = $conn->prepare("SELECT id, name FROM pharmacies WHERE storeID = ?");
$pharmacyQuery->bind_param("s", $storeID);
$pharmacyQuery->execute();
$pharmacyResult = $pharmacyQuery->get_result();
$pharmacy = $pharmacyResult->fetch_assoc();
$pharmacyId = $pharmacy['id'];
$pharmacyName = $pharmacy['name'];

// Fetch orders for this pharmacy
$ordersQuery = $conn->prepare("SELECT o.id, o.prescription_name, o.status, p.firstName AS patientName 
                               FROM orders o
                               JOIN patients p ON o.patient_id = p.id
                               WHERE o.pharmacy_id = ?");
$ordersQuery->bind_param("i", $pharmacyId);
$ordersQuery->execute();
$orders = $ordersQuery->get_result()->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Dashboard</title>
    <link rel="stylesheet" href="../css/pharmacy_style.css">
    <script>
        const orders = <?php echo json_encode($orders); ?>;
    </script>
    <script src="../js/pharmacy_script.js" defer></script>
</head>
<body>
    <nav>
        <div class="logo">Welcome, <?php echo htmlspecialchars($pharmacyName); ?></div>
        <ul class="nav-links">
            <li><a href="#home">Home</a></li>
            <li><a href="#orders">Orders</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <section id="orders">
        <h2>Patient Orders</h2>
        <div id="order-list">
            <!-- Orders will be dynamically populated -->
        </div>
    </section>
</body>
</html>
