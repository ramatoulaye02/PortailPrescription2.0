<?php
session_start();
if (!isset($_SESSION['email'])) {
    header('Location: patient_login.php'); // Redirect to login if not logged in
    exit();
}

include 'connect.php';

// Fetch patient details
$email = $_SESSION['email'];
$query = $conn->prepare("SELECT id, firstName FROM patients WHERE email = ?");
$query->bind_param("s", $email);
$query->execute();
$result = $query->get_result();
$patient = $result->fetch_assoc();

$patientId = $patient['id'];
$patientName = $patient['firstName'];

// Fetch patient orders
$ordersQuery = $conn->prepare("
    SELECT o.id, o.prescription_name, o.status, p.name AS pharmacyName 
    FROM orders o
    JOIN pharmacies p ON o.pharmacy_id = p.id
    WHERE o.patient_id = ?
");

$ordersQuery->bind_param("i", $patientId);
$ordersQuery->execute();
$orders = $ordersQuery->get_result()->fetch_all(MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Dashboard</title>
    <link rel="stylesheet" href="../css/pdashstyle.css">
    <script>
        const orders = <?php echo json_encode($orders); ?>;
    </script>
    <script src="../js/pdashscript.js" defer></script>
</head>
<body>
    <!-- Navbar -->
    <nav>
        <div class="logo">Welcome, <?php echo htmlspecialchars($patientName); ?>!</div>
        <ul class="nav-links">
            <li><a href="#submit-order">Submit Order</a></li>
            <li><a href="#my-orders">My Orders</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>

    <!-- Submit Order Section -->
    <section id="submit-order">
        <h2>Submit a New Order</h2>
        <form method="POST" action="submit_order.php">
            <label for="pharmacy">Select Pharmacy:</label>
            <select name="pharmacy_id" id="pharmacy" required>
                <option value="" disabled selected>Select a pharmacy</option>
                <?php
                $pharmaciesQuery = "SELECT id, name FROM pharmacies";
                $pharmaciesResult = $conn->query($pharmaciesQuery);
                while ($pharmacy = $pharmaciesResult->fetch_assoc()) {
                    echo "<option value='{$pharmacy['id']}'>{$pharmacy['name']}</option>";
                }
                ?>
            </select>

            <label for="prescription">Prescription Name:</label>
            <input type="text" name="prescription_name" id="prescription" placeholder="Enter Prescription Name" required>

            <button type="submit">Submit Order</button>
        </form>
    </section>

    <!-- My Orders Section -->
    <section id="my-orders">
        <h2>My Orders</h2>
        <div id="order-list">
            <!-- Orders will be dynamically populated -->
        </div>
    </section>
</body>
</html>
