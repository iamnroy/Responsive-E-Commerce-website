<?php
session_start();
error_reporting(0);
include '../connect.php';


if (isset($_GET['traderdel'])) {

    $tredshop = $_GET['traderdel'];
}

$sql = oci_parse($conn, " DELETE FROM SHOP WHERE SHOP_ID='$tredshop'");
$res = oci_execute($sql);

if ($res) {
    //echo "<script>alert('SHOP DELETED!!');</script>";
    // header('location:tradershop.php');
} else {
    echo "Error !";
    exit();
}


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SHOP</title>
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="../image/logo_innovative_grocery.png">

</head>

<body style="font-family: 'Open Sans', sans-serif;overflow: hidden;">
    <div id="wrapper">
        <?php include('head.php'); ?>

        <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <li class="text-center">

                    </li>

                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-3x"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="productlist.php"><i></i>Product</a>
                    </li>
                    <li>
                        <a href="req-product.php"><i></i>Requested Product</a>
                    </li>
                    <li>
                        <a href="review.php"><i></i> Review</a>
                    </li>

                    <li>
                        <a><i></i>Report<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <li>
                                <a href="periodicreport.php">Trader Income Report</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a><i></i>Manage User<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <a href="Traderlist.php">Trader</a>
                            </li>
                            <li>
                                <a href="trader-req.php">Trader Requests</a>
                            </li>
                            <li>
                                <a href="Customerlist.php">Customer</a>
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
                                SHOP LISTS
                            </h6>
                            <table class="table text-center mt-1 table bordered">
                                <thead>
                                    <tr>
                                        <th>IMAGE</th>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>LOCATION</th>
                                        <th>TRADER ID</th>
                                        <th>ACTION</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $sql = oci_parse($conn, "SELECT * FROM SHOP WHERE STATUS='ENABLE'");
                                    $result = oci_execute($sql);

                                    if ($result != false)
                                        while ($data = oci_fetch_assoc($sql)) { ?>
                                        <tr>
                                            <!--  <form method="POST" enctype="multipart/form-data"> -->
                                            <td><?php if (!empty($data['IMAGE'])) : ?>
                                                    <img src="../<?php echo $data['IMAGE']; ?>" width="50">
                                                <?php endif; ?>
                                            </td>
                                            <td><?php echo $data['SHOP_ID'] ?></td>
                                            <td><?php echo $data['SHOP_NAME'] ?></td>
                                            <td><?php echo $data['SHOP_LOCATION'] ?></td>
                                            <td><?php echo $data['TRADER_ID'] ?></td>

                                            <td> <a href="tradershop.php?traderdel=<?php echo $data['SHOP_ID']; ?>" onClick="edit(this);" title="Edit"><i class="fa fa-trash" style="font-size:30px;color:red;"></i> </a>
                                                <a href="shop-product.php?sid=<?php echo $data['SHOP_ID']; ?>" onClick="edit(this);" title="Edit">VIEW </a>
                                            </td>
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