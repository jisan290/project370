<?php
include 'connect.php';
session_start();


$supplier_id = isset($_SESSION['supplier_id']) ? $_SESSION['supplier_id'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
 
    $stock = isset($_POST['stock-state']) ? $_POST['stock-state'] : '';
    $product_id = isset($_POST['product_id']) ? $_POST['product_id'] : '';
    $availability = "In Stock";

    
 

    $sql = "UPDATE products SET stock = ? , availabilityStatus = ? where supplier_id = ? and product_id = ?";
    

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        
        $stmt->bind_param('isss',$stock ,$availability, $supplier_id , $product_id);
        

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Profile updated successfully.";
            header("location: sellerhome.php");
        } else {
            echo "No changes were made.";
            echo "Product ID: " . $product_id;
            echo "Supplier ID: " . $supplier_id;
        }

        $stmt->close();
    } else {
        echo "Failed to prepare the SQL statement.";
    }

    $conn->close();
}
?>