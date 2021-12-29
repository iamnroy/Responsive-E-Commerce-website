<?php
session_start();
error_reporting(0);
include '../connect.php';

if (!($_SESSION['role']) && $_SESSION['role'] != "trader") {
    header('location:login.php');
}

if (isset($_GET['prodrev'])) {
    $pr = $_GET['prodrev'];
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Trader Panel</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../image/logo_innovative_grocery.png">

</head>

<body style="font-family: 'Open Sans', sans-serif;overflow: hidden;">
    <div id="wrapper">
        <?php include('top-hav.php'); ?>

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">

                    </li>

                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="shop.php"><i></i>My Shop</a>
                    </li>



                    <li>
                        <a><i></i>Report<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="sales.php">Sales Report</a>
                            </li>
                            <li>
                                <a href="order-report.php">Order Report</a>
                            </li>

                        </ul>
                    </li>

                </ul>

            </div>

        </nav>
        <div id="page-wrapper">
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">

                        <div class="add-product main-parts mt-2">
                            <h6 style="text-align: center; font-family:-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; font-style:inherit; color: rgb(43, 76, 88); font-size:xx-large;">
                                REVIEWS ON PRODUCT
                            </h6>
                            <div class="text-center1">


                                <a href="addproduct.php?addpro=<?php echo $shopid; ?>"> <input type="submit" value="ADD PRODUCT &raquo;" class="btn btn-add-products"></a>
                            </div>
                            <table class="table text-center mt-1 table bordered">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Rating</th>
                                        <th>Comments</th>



                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    // $sql=oci_parse($conn,"SELECT P.PRODUCT_IMAGE,R.RATING,R.COMMENTS FROM PRODUCT1 P,REVIEW R WHERE R.PRODUCT_ID'$pr'");
                                    $sql = oci_parse($conn, "SELECT * FROM REVIEW WHERE PRODUCT_ID='$pr'");

                                    $result = oci_execute($sql);

                                    if ($result != false)
                                        while ($data = oci_fetch_assoc($sql)) { ?>
                                        <tr>
                                            <!--    <form method="POST" enctype="multipart/form-data"> -->

                                            <td><?php echo $data['PRODUCT_ID'] ?></td>
                                            <td><?php echo $data['RATING'] ?></td>
                                            <td><?php echo $data['COMMENTS'] ?></td>


                                            <!--  </form> -->
                                        </tr>
                                </tbody>
                            <?php } ?>
                            </table>

                        </div>


                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/custom.js"></script>


</body>

</html>