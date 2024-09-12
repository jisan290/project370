<?php


include 'connect.php';

if(isset($_POST['seller'])){
    $id = unique_id();
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $gmail = $_POST['gmail'];
    $pass = $_POST['password'];
   
    $phone = $_POST['phone'];
    $address = $_POST['saddress'];
    $nid = $_POST['nid'];

    #-----


     $checkEmail = "SELECT * From user where gmail = '$gmail'";
     $result = $conn->query($checkEmail);
     if($result->num_rows>0){
        echo "email already exits";
     }
     else {
        $insertQuery = "INSERT INTO user(first_name , last_name , gmail , password , phone , shop_address , nid  , unique_id)
        VALUES('$firstName' , '$lastName' , '$gmail' , '$pass' , '$phone' , '$address' , '$nid' , '$id')";
        if($conn->query($insertQuery)==TRUE){
            header("location: login.html");
        }
        else {
            echo "error:".$conn->error;
        }
        

     }

}elseif(isset($_POST['customer'])){
    $id = unique_id();
    $name = $_POST['name'];
    $gmail = $_POST['gmail'];
    $pass = $_POST['password'];
   
    $phone = $_POST['phone'];
    $address = $_POST['saddress'];

     $checkEmail = "SELECT * From customer where gmail = '$gmail'";
     $result = $conn->query($checkEmail);
     if($result->num_rows>0){
       echo "email already exits";
     }
     else {
        $insertQuery = "INSERT INTO customer(name , gmail , password , phone , address , unique_id)
        VALUES('$name', '$gmail' , '$pass' , '$phone' , '$address' , '$id')";
        if($conn->query($insertQuery)== TRUE){
            header("location: login.html");
        }else {

        }echo "error:".$conn->error;

     }


}elseif(isset($_POST['login'])){
    $gmail = $_POST['login_gmail'];
    $pass = $_POST['login_password'];

     if($gmail == 'admin' && $pass == 'admin646'){
        header("location: admin.html");
     }else {
        

        $checkEmail_from_user = "SELECT * From user where gmail = '$gmail'";
        $checkPassword_from_user = "SELECT * From user where password = '$pass'";


        $checkEmail_from_customer = "SELECT * From customer where gmail = '$gmail'";
        $checkPassword_from_customer = "SELECT * From customer where password = '$pass'";


        $result1 = $conn->query($checkEmail_from_user);
        $passResult1 = $conn->query($checkPassword_from_user);



        $result2 = $conn->query($checkEmail_from_customer);
        $passResult2 = $conn->query($checkEmail_from_customer);


        if($result1->num_rows>0 && $passResult1->num_rows>0){
            session_start();

            $fname = "select first_name from user where password = '$pass'";
            $lname = "select last_name from user where password = '$pass'";


            $fR = $conn->query($fname);
            $lR = $conn->query($lname);

            $r1 = $fR->fetch_assoc();
            $r2 = $lR->fetch_assoc();

            $firstName = $r1['first_name'];
            $lastName = $r2['last_name'];
            

            $_SESSION['fname'] = $firstName;
            $_SESSION['lname'] = $lastName;

            header("location: sellerhome.php");
            exit();
            
            



        }elseif($result2->num_rows>0 && $passResult2->num_rows>0){

            header("location: customerhome.html");

        
        
        }else{

            header("location: login.html");
        }




     }
    
     


}
?>