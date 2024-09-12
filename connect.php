<?php

// $firstName = $_POST['fname'];
// $lastName = $_POST['lname'];
// $gmail = $_POST['gmail'];
// $pass = $_POST['password'];
// $phone = $_POST['phone'];
// $address = $_POST['saddress'];
// $nid = $_POST['nid'];



$host = "localhost";
$user = "root";
$pass = "";
$db = "login";
$conn = new mysqli('localhost' , 'root' , '' , 'agrovillage' , 4306);

if($conn->connect_error){
    echo "failed to connect DB".$conn->connect_error;

// }else {

//     $stmt = $conn->prepare("insert into user(first_name , last_name , gmail , password , phone , shop_address , nid ) values(? , ? , ? , ? , ? , ? , ?)");
//     $stmt->bind_param("ssssss" , $firstName , $lastName , $gmail , $pass , $phone , $address , $nid);
//     $stmt->execute();
//     echo "registration fucked";
//     $stmt->close();
//     $conn->close();

}
function unique_id(){
    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIKLMNOPQRSTUVWXYZ';
    $charLenght = strlen($char);
    $randomString = '';
    for($i = 0; $i < 20; $i++){

        $randomString.=$char[mt_rand(0 , $charLenght)-1];

    }
    return $randomString;
}



// }

?>