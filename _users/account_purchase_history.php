<?php
include('../database/connect.php');
include('handling/handling_account_purchase_history.php');
if (!isset($_SESSION['account_id'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Purchase history</title>

        <link rel="stylesheet" href="../assets/others/vendor/feather/feather.css">
        <link rel="stylesheet" href="../assets/others/vendor/mdi/css/materialdesignicons.min.css">
        <link rel="stylesheet" href="../assets/others/vendor/ti-icons/css/themify-icons.css">
        <link rel="stylesheet" href="../assets/others/vendor/typicons/typicons.css">
        <link rel="stylesheet" href="../assets/others/vendor/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="../assets/others/vendor/css/vendor.bundle.base.css">

        <link rel="stylesheet" href="../assets/others/vendor/select2/select2.min.css">
        <link rel="stylesheet" href="../assets/others/vendor/select2-bootstrap-theme/select2-bootstrap.min.css">

        <link rel="stylesheet" href="../assets/css/users/account_page.css">
        <link rel="shortcut icon" href="../assets/img/others/favicon.png" />
    </head>
    <body>
        <div class="container-scroller">
            <!-- partial:../../partials/_navbar.html -->
            <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
                <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                    <div class="me-3">
                        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                            <span class="icon-menu"></span>
                        </button>
                    </div>
                    <div>
                        <a class="navbar-brand brand-logo" href="index.php">
                            <img src="../assets/img/others/logo.svg" alt="logo" />
                        </a>
                        <a class="navbar-brand brand-logo-mini" href="index.php">
                            <img src="../assets/img/others/logo-mini.svg" alt="logo" />
                        </a>
                    </div>
                </div>
                <div class="navbar-menu-wrapper d-flex align-items-top"> 
                    <ul class="navbar-nav">
                        <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
                            <h1 class="welcome-text">Hello, <span class="text-black fw-bold"><?php echo $_SESSION['account_name'] ?></span></h1>
                            <h3 class="welcome-sub-text">How are you doing?</h3>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- partial -->
            <div class="container-fluid page-body-wrapper">
                <nav class="sidebar sidebar-offcanvas" id="sidebar">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link" href="account_page.php">
                                <i class="mdi mdi-account-circle menu-icon"></i>
                                <span class="menu-title">Your account</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account_reset_pass.php">
                                <i class="menu-icon mdi mdi-refresh"></i>
                                <span class="menu-title">Reset password</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account_order.php">
                                <i class="menu-icon mdi mdi-shopping"></i>
                                <span class="menu-title">Your Order</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="account_purchase_history.php">
                                <i class="menu-icon mdi mdi-history"></i>
                                <span class="menu-title">Purchase History</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="handling/handling_logout.php">
                                <i class="mdi mdi-logout-variant menu-icon"></i>
                                <span class="menu-title">Log out</span>
                            </a>
                        </li>
                    </ul>
                </nav>

                <!-- partial -->

                <!-- waiting -->
                <div class="row flex-grow col-6">
                    <div class="content-wrapper">
                        <div class="col-12 grid-margin stretch-card">
                            <div class="card card-rounded">
                                <div class="card-body">
                                    <div class="d-sm-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="card-title card-title-dash">Purchase History</h4>                    
                                        </div>                  
                                    </div>
                                    <?php
                                    $total = 0;
                                    $query_order = mysqli_query($con, "SELECT * FROM purchases_history WHERE account_id=" . $_SESSION['account_id'] . ";");
                                    while ($row = mysqli_fetch_array($query_order)) {
                                        ?>
                                        <hr style="color:brown">
                                        <div class="infor_product mt-3 row">
                                            <div class="col-4">
                                                <div class="id_product">
                                                    History ID: 
                                                    <span href="" class="id_order_input"><?php echo htmlentities($row['purchase_id']); ?></span>
                                                </div>
                                                <div class="Address">
                                                    Address: 
                                                    <span href="" class="address_order_input"><?php echo htmlentities($row['purchase_history_address']); ?></span>
                                                </div>
                                            </div>     
                                            <div class="col">
                                                <div class="Phone">
                                                    Phone: 
                                                    <span href="" class="phone_order_input"><?php echo htmlentities($row['purchases_history_phone']); ?></span>
                                                </div>
                                                <div class="Date">
                                                    Date: 
                                                    <span href="" class="Date_order_input"><?php echo htmlentities(substr($row['created_date_purchase_history'], 0, strlen($row['created_date_purchase_history']) - 9)); ?></span>
                                                </div>
                                            </div>             
                                        </div>                
                                        <div class="table-responsive  mt-1">
                                            <table class="table select-table">
                                                <thead>
                                                    <tr>                      
                                                        <th>#</th>
                                                        <th>Product</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Amount</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $count = 1;
                                                    //split order
                                                    $purchase_history_product_all_id = explode(',', $row['purchase_history_product_all_id']);
                                                    $purchase_history_all_quantity = explode(',', $row['purchase_history_all_quantity']);
                                                    for ($i = 0; $i < count($purchase_history_product_all_id); $i++) {
                                                        $infor_product = "products.product_id, product_name, product_price, product_image_1, discount";
                                                        $query_products = mysqli_query($con, "SELECT " . $infor_product . " FROM products, count_sales, product_types, coupons WHERE products.product_type_id=product_types.product_type_id AND product_types.coupon_id=coupons.coupon_id AND count_sales.product_id=products.product_id AND products.product_id=$purchase_history_product_all_id[$i];");
                                                        while ($row_product = mysqli_fetch_array($query_products)) { ?>
                                                            <tr>
                                                                <td class="pt-4 pt-3">
                                                                    <h6><?php
                                                                        echo $GLOBALS['count'];
                                                                        $GLOBALS['count']++;
                                                                        ?></h6>
                                                                </td>
                                                                <td>
                                                                    <div class="d-flex ">
                                                                        <img src="../assets/img/image_products/<?php echo htmlentities($row_product['product_image_1']); ?>" alt="">
                                                                        <div class="pt-3">
                                                                            <h6><?php echo htmlentities($row_product['product_name']); ?></h6>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <h6>$<?php echo htmlentities($row_product['product_price'] - ($row_product['product_price'] * ($row_product['discount'] / 100))); ?></h6>
                                                                </td>
                                                                <td  style="padding-left: 20px;">
                                                                    <h6><?php echo $purchase_history_all_quantity[$i]; ?></h6>
                                                                </td>
                                                                <td>
                                                                    <h6>$<?php echo htmlentities(($row_product['product_price'] - ($row_product['product_price'] * ($row_product['discount'] / 100))) * $purchase_history_all_quantity[$i]); ?></h6>
                                                                </td>
                                                            </tr>  
                                                        <?php } ?>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                            <hr style="color:Gray">
                                            <div class="row container-fluid">                   
                                                <div class="col" style="text-align: right; font-size:20px;margin-right: 50px;">
                                                    Total:<span>$<?php echo $row['purchase_history_total_price'] ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <footer class="footer">
                        <div class="d-sm-flex justify-content-center justify-content-sm-between">
                            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">From <a href="https://www.bootstrapdash.com/" target="_blank">MEOW SHOP</a> with love</span>
                            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Copyright © 2022</span>
                        </div>
                    </footer>  

                </div>
            </div>
        </div>
        <script src="../assets/others/vendor/js/vendor.bundle.base.js"></script>

        <script src="../assets/others/vendor/typeahead.js/typeahead.bundle.min.js"></script>
        <script src="../assets/others/vendor/select2/select2.min.js"></script>
        <script src="../assets/others/vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

        <script src="../assets/js/off-canvas.js"></script>
        <script src="../assets/js/hoverable-collapse.js"></script>
        <script src="../assets/js/template.js"></script>
        <script src="../assets/js/settings.js"></script>
        <script src="../assets/js/todolist.js"></script>

        <script src="../assets/js/file-upload.js"></script>
        <script src="../assets/js/typeahead.js"></script>
        <script src="../assets/js/select2.js"></script>
    </body>

</html>
