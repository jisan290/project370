
<?php
    session_start();
    $fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : '';
    $lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : '';

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="sellerhome.css">
</head>

<body>

    <!-- <div class="header">
        <div class="left">
            <img src="images/logo-removebg-preview.png">
        </div>
        <div class="right">

        </div>


    </div> -->
    
    <div class="header">
        <div class="left">
            <a class="navbar-brand" href="#">
                <img src="images/agroLOGO.png" alt="Logo" class="d-inline-block align-text-top">

            </a>

        </div>
        <div class="middle">
            <p>welcome to agro village</p>
        </div>
        <div class="right">
            <button type="button" class="btn btn-outline-success">explore</button>
        </div>
    </div>
    <div class="sidebar">
        <div class="profile">
            <div class="profile-pic">
                <img src="images/zoro.jpeg">
            </div>
            <div>
                
                <p><?php echo htmlspecialchars($fname); ?>
                <?php echo htmlspecialchars($lname); ?>
                </p>
                    
                
            </div>
            


        </div>
        <div class="dashboard box"><p>dashboard</p></div>
        <div class="add_products box"><p>Add products</p></div>
        <div class="view_products box"><p>View products</p></div>
        <div class="accounts box"><p>Accounts</p></div>
        <div class="logOUT box"><a>Log out<a/></div>
        <div class="social"></div>


    </div>

</body>

</html>