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
    <link rel="stylesheet" href="tags.css">
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
            <!-- <h1 data-splitting>welcome to agro village</h1> -->
            <p>welcome to agro village</p>
        </div>
        <div class="right">
            <button type="button" class="btn btn-outline-success explore-button">explore</button>
        </div>
    </div>
    <div class="sidebar">
        <div class="profile">
            <div class="profile-pic">
                <img src="images/zoro.jpeg">
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
            <p  id = "glowp" onclick="toAddproducts()">Add products</p>
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
                        <div class="values pa"> [6]</div>
                    </span></div>
                <div class="col-6 col-md-4 info-div">orders <span>
                        <div class="values or">[4]</div>
                    </span></div>
            </div>


            <div class="row">
                <div class="col-6 col-md-4 info-div">recently added <span>
                        <div class="values ra">[1]</div>
                    </span></div>
                <div class="col-6 col-md-4 info-div">delivered <span>
                        <div class="values deli">[2]</div>
                    </span></div>
                <div class="col-6 col-md-4 info-div">On the way <span>
                        <div class="values ontw">[3]</div>
                    </span></div>
            </div>


            <div class="row last-row">
                <div class="col-6 info-div lastdiv1">out of stock <span>
                        <div class="values ost">[2]</div>
                    </span></div>
                <div class="col-6 info-div lastdiv2">returned <span>
                        <div class="values re">[1]</div>
                    </span></div>
            </div>
        </div>
    </div>


    <div class="add_products_form" id="add_products_box" style="display: none;">

        <form method="post">
            <div class="input-group title">
                <span class="input-group-text" id="inputGroup-sizing-default">Title</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="mb-3 Description grid">
                <label for="exampleFormControlTextarea1" class="form-label ">Description</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="priceandcategory grid">
                <select class="form-select cate" aria-label="Default select example">
                    <option selected>category</option>
                    <option value="1">Crops</option>
                    <option value="2">Vegetables</option>
                    <option value="3">Fruits</option>
                </select>


                <div class="input-group mb-3 price grid">
                    <span class="input-group-text" id="inputGroup-sizing-default">Price</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="input-group mb-3 discount grid">
                <span class="input-group-text">discount?</span>
                <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">
                <span class="input-group-text">.00</span>
            </div>
            <div class="brandandweight grid">
                <div class="input-group mb-3 brand">
                    <span class="input-group-text" id="inputGroup-sizing-default">Brand</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>


                <div class="input-group mb-3">
                    <span class="input-group-text" id="inputGroup-sizing-default">Weight</span>
                    <input type="text" class="form-control" aria-label="Sizing example input"
                        aria-describedby="inputGroup-sizing-default">
                </div>
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text" id="inputGroup-sizing-default">Return policy</span>
                <input type="text" class="form-control" aria-label="Sizing example input"
                    aria-describedby="inputGroup-sizing-default">
            </div>
            <div class="fileandsubmit">
                <div class="mb-3 img-file">

                    <input class="form-control" type="file" id="formFileMultiple" multiple>
                </div>
                <div class="col-12 submit-button-box">
                    <button class="btn btn-primary submit-button" type="submit">Submit form</button>
                </div>
            </div>






        </form>



    </div>


    <script src="sellerhome.js"></script>

</body>

</html>