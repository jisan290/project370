<?php
include 'connect.php';
session_start();


$supplier_id = isset($_SESSION['supplier_id']) ? $_SESSION['supplier_id'] : '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the full name and split it
    $full_name = isset($_POST['name']) ? $_POST['name'] : '';
    $name_parts = explode('_', $full_name , 2);
    $first_name = $name_parts[0];
    $last_name = $name_parts[1];
    
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';

/////////////
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $parts = explode('/', $address);
    $city = $parts[0];
    $road = $parts[1];
    $house = $parts[2];
/////////////

 

    // Prepare SQL query
    $sql = "UPDATE supplier SET first_name = ?, last_name = ?, gmail = ?, phone = ?, city = ? , road = ? , house = ? where unique_id = ?";
    

    $stmt = $conn->prepare($sql);

    if ($stmt) {
        
        $stmt->bind_param('ssssssss', $first_name, $last_name, $email, $phone, $city , $road , $house , $supplier_id);
        

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Profile updated successfully.";
            header("location: sellerhome.php");
        } else {
            echo "No changes were made.";
        }

        $stmt->close();
    } else {
        echo "Failed to prepare the SQL statement.";
    }

    $conn->close();
}
?>