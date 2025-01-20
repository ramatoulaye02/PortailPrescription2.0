<?php
include 'connect.php';
$data = json_decode(file_get_contents("php://input"), true);

if (isset($data['id']) && isset($data['status'])) {
    $orderId = $data['id'];
    $newStatus = $data['status'];

    // Ensure the status is valid
    if (in_array($newStatus, ['Pending', 'Fulfilled', 'Cancelled'])) {
        $query = $conn->prepare("UPDATE orders SET status = ? WHERE id = ?");
        $query->bind_param("si", $newStatus, $orderId);

        if ($query->execute()) {
            http_response_code(200);
            
        } else {
            http_response_code(500);
            
        }
    } else {
        http_response_code(400);
        
    }
} else {
    http_response_code(400);
    echo json_encode(["message" => "Invalid input."]);
}
?>
