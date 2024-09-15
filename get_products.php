<?php
include 'connect.php';
session_start();

$supplier_id = isset($_SESSION['supplier_id']) ? $_SESSION['supplier_id'] : '';

$sql = "SELECT title, description, price, category, images FROM products WHERE supplier_id = ?";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("s", $supplier_id);
    $stmt->execute();
    $result = $stmt->get_result();

    $products = [];
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }

    echo json_encode($products);
    $stmt->close();
} else {
    echo json_encode([]);
}

$conn->close();
?>
