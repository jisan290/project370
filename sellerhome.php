<?php
    include 'connect.php';
    session_start();
    $fname = isset($_SESSION['fname']) ? $_SESSION['fname'] : '';
    $lname = isset($_SESSION['lname']) ? $_SESSION['lname'] : '';
    $supplier_id = isset($_SESSION['supplier_id']) ? $_SESSION['supplier_id'] : '';

    $onTheway = 0;
    $_SESSION['supplier_id_form'] = $supplier_id;


    $sql = "SELECT COUNT(*) AS product_count FROM products WHERE supplier_id = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt) {

        $stmt->bind_param("s", $supplier_id); 
        $stmt->execute();
        
    
        $result = $stmt->get_result();
        

        $product_count = '0'; 
        if ($row = $result->fetch_assoc()) {
            
            $product_count = (string) $row['product_count']; 
        }

        $stmt->close();
    } else {

        echo "Failed to prepare the SQL statement.";
    }

    $sql_order = "SELECT COUNT(*) AS order_count
        FROM order_table o
        JOIN products p ON o.product_id = p.product_id
        WHERE p.supplier_id = ?";
    $stmt_order = $conn->prepare($sql_order);

    if ($stmt_order) {
      
        $stmt_order->bind_param("s", $supplier_id); 
        $stmt_order->execute();
        $result = $stmt_order->get_result();


        $order_count = '0'; 
        if ($row = $result->fetch_assoc()) {
            $onTheway = (int) $row['order_count'];
            $order_count = $row['order_count'];
        }
        
        $stmt_order->close();
    } else {
        echo "Failed to prepare the SQL statement.";
    }



    $sql_delivered = "SELECT COUNT(*) AS deliver_count
    FROM order_table o
    JOIN products p ON o.product_id = p.product_id
    WHERE p.supplier_id = ? AND o.delivered = TRUE";

    $stmt_delivered = $conn->prepare($sql_delivered);

    if($stmt_delivered){
        $stmt_delivered->bind_param("s" , $supplier_id);
        $stmt_delivered->execute();
        $result = $stmt_delivered->get_result();

        $deliver_count = '0';
        if($row = $result->fetch_assoc()){
            $onTheway -= (int) $row['deliver_count'];
            $deliver_count = $row['deliver_count'];
        }
        $stmt_delivered->close();

    } else {
        echo "Failed to prepare the SQL statement.";
    }

    $sql_returned = "SELECT COUNT(*) AS return_count
    FROM order_table o
    JOIN products p ON o.product_id = p.product_id
    WHERE p.supplier_id = ? AND o.returned = TRUE";

    $stmt_returned = $conn->prepare($sql_returned);

    if($stmt_returned){
        $stmt_returned->bind_param("s" , $supplier_id);
        $stmt_returned->execute();
        $result = $stmt_returned->get_result();

        $return_count = '0';
        if($row = $result->fetch_assoc()){
            $return_count = $row['return_count'];
        }
        $stmt_returned->close();

    } else {
        echo "Failed to prepare the SQL statement.";
    }

    $sql_stock = "SELECT COUNT(*) AS stock_count FROM products  WHERE supplier_id = ? AND availabilityStatus = 'Out Of Stock'";

    $stmt_stock = $conn->prepare($sql_stock);

    if($stmt_stock){
        $stmt_stock->bind_param("s" , $supplier_id);
        $stmt_stock->execute();
        $result = $stmt_stock->get_result();

        $stock_count = '0';
        if($row = $result->fetch_assoc()){
            $stock_count = $row['stock_count'];
        }
        $stmt_stock->close();

    } else {
        echo "Failed to prepare the SQL statement.";
    }

    
       
$conn->close();

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
    <link rel="stylesheet" href="tags.css">
</head>

<body>



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
            <button type="button" class="btn btn-outline-success explore-button">explore</button>
        </div>
    </div>
    <div class="sidebar">
        <div class="profile ">
            <div class="profile-pic profile-pic-js" id = "profileimage">
                <!-- <img src="images/zoro.jpeg"> -->
            </div>
            <div>

                <p>
                    <?php echo htmlspecialchars($fname); ?>
                    <?php echo htmlspecialchars($lname); ?>


                </p>


            </div>



        </div>
        <div class="dashboard box">
            <p id="glowD" onclick="toDashboard()">dashboard</p>
        </div>
        <div class=" add_products box">
            <p id="glowp" onclick="toAddproducts()">Add products</p>
        </div>
        <div class="view_products box">
            <p>View products</p>
        </div>
        <div class="accounts box">
            <p>Accounts</p>
        </div>
        <div class="logOUT box"><a href="login.html">Log out</a></div>
        <div class="social"></div>


    </div>
    <div class="main_container" id="dashboard_box">
        <div class=" container text-center">

            <div class="row">
                <div class="col-md-8 info-div">products currently available <span>
                        <div class="values pa"> [<?php echo htmlspecialchars($product_count); ?>]
                        </div>
                    </span></div>
                <div class="col-6 col-md-4 info-div">orders <span>
                        <div class="values or">[<?php echo htmlspecialchars($order_count); ?>]
                        </div>
                    </span></div>
            </div>


            <div class="row">
                <div class="col-6 col-md-4 info-div">recently added <span>
                        <div class="values ra">[1]</div>
                    </span></div>
                <div class="col-6 col-md-4 info-div">delivered <span>
                        <div class="values deli">[<?php echo htmlspecialchars($deliver_count); ?>]</div>
                    </span></div>
                <div class="col-6 col-md-4 info-div">On the way <span>
                        <div class="values ontw">[<?php echo htmlspecialchars($onTheway); ?>]</div>
                    </span></div>
            </div>


            <div class="row last-row">
                <div class="col-6 info-div lastdiv1">out of stock <span>
                        <div class="values ost">[<?php echo htmlspecialchars($stock_count); ?>]</div>
                    </span></div>
                <div class="col-6 info-div lastdiv2">returned <span>
                        <div class="values re">[<?php echo htmlspecialchars($return_count); ?>]</div>
                    </span></div>
            </div>
        </div>
    </div>


    <div class="add_products_form" id="add_products_box" style="display: none;">

        <form method="post" action="forms.php">
            <div class="input-group title">
                <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" required name="title">
            </div>
            <div class="mb-3 Description grid">
                <label for="exampleFormControlTextarea1" class="form-label ">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description" required></textarea >
            </div>
            <div class="priceandcategory grid">
                <select class="form-select cate" aria-label="Default select example" required name="category">
                    <option selected>category</option>
                    <option value="1">Crops</option>
                    <option value="2">Vegetables</option>
                    <option value="3">Fruits</option>
                </select>


                <div class="input-group mb-3 price grid">
                    <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required name="price">
                </div>
            </div>
            <div class="discountandtags grid">
                <div class="input-group mb-3 discount">
                    <span class="input-group-text discountspan">discount?</span>
                    <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" required name="discount">
                    <span class="input-group-text">.00</span>
                </div>
                <div class="input-group mb-3 tags">
                    <span class="input-group-text" id="inputGroup-sizing-default">tags</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" name="tags">
                </div>

            </div>
            <div class="brandandweight grid">
                <div class="input-group mb-3 brand">
                    <span class="input-group-text" id="inputGroup-sizing-default">Brand</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" name="brand">
                </div>


                <div class="input-group mb-3 weight">
                    <span class="input-group-text" id="inputGroup-sizing-default">stock</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default" required name="stock">
                </div>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Return policy</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default" required name="return">
            </div>
            <div class="fileandsubmit">
                <div class="mb-3 img-file">

                    <input class="form-control" type="file" id="formFileMultiple" multiple required name="imgfile">
                </div>
                <div class="col-12 submit-button-box">
                    <button class="btn btn-primary submit-button" type="submit" name="add">Submit form</button>
                </div>
            </div>






        </form>



    </div>


    <script src="sellerhome.js"></script>

</body>

</html>