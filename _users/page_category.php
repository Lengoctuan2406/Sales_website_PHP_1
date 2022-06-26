<?php
include('../database/connect.php');
include('handling/handling_index.php');
if (!isset($_GET['product_type_id'])) {
    header("location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <link href="../assets/img/others/logo_mini.png" rel="icon">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>  

    <!-- Bootstrap -->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- Bootstrap -->

    <link rel="stylesheet" href="../assets/css/users/footer.css"> 
    <link rel="stylesheet" href="../assets/css/users/header.css"> 
    <link rel="stylesheet" href="../assets/css/users/page_product.css">  
    <title>Page Category</title>
</head>
<header>
    <nav class="navbar__container">
        <div class="navbar__topnav navbar__topnav-main">
            <div class="topnav__item topnav__item__logo">
                <a href="index.php">
                    <img class="imageradius" src="../assets/img/others/logo_meow.png" style="max-width: 130px; padding-top: 10px"
                         alt="product1">
                </a>
            </div>

            <div class="topnav__item topnav__item-fullscreen">
                <a href="index.php" class="topnav__item__button">
                    HOME
                </a>
                <div id="topnav__item-product">
                    <a href="" class="topnav__item__button">
                        PRODUCT
                    </a>
                    <div class="product__dropdown__content">
                        <?php
                        $query_type = mysqli_query($con, "SELECT product_type_id, product_type_name FROM product_types;");
                        while ($row = mysqli_fetch_array($query_type)) {
                            ?>
                            <a href="page_category.php?product_type_id=<?php echo htmlentities($row['product_type_id']); ?>"><?php echo htmlentities($row['product_type_name']); ?></a>
                        <?php } ?>
                    </div>
                </div>
                <a href="" class="topnav__item__button">
                    CONTACT
                </a>
            </div>
            <div class="topnav__item topnav__item-fullscreen">
                <input type="text" id="topnav__search__input" />
                <?php
                if (!isset($_SESSION['account_id'])) {
                    ?>
                    <a href="login.php" class="topnav__item__button">
                        LOG IN
                    </a>
                <?php } else { ?> 
                    <a href="account_page.php" class="topnav__item__button">
                        Hello <?php echo $_SESSION['account_name']; ?>
                    </a> 
                <?php } ?>
                <div id="topnav__item__cart">
                    <a class="topnav__item__button topnav__item-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </a>

                    <div class="cart__dropdown">
                        <div class="cart__dropdown__list">
                            <?php
                            $total = 0;
                            $infor_cart = "products.product_id, product_name, product_price, product_image_1, discount, cart_quantity";
                            $table = "products, count_sales, product_types, coupons, carts";
                            $link = "products.product_type_id=product_types.product_type_id AND product_types.coupon_id=coupons.coupon_id AND count_sales.product_id=products.product_id AND carts.product_id=products.product_id";
                            $query_carts = mysqli_query($con, "SELECT " . $infor_cart . " FROM $table WHERE $link AND account_id=" . $_SESSION['account_id'] . ";");
                            while ($row = mysqli_fetch_array($query_carts)) {
                                $GLOBALS['total'] += (($row['product_price'] - ($row['product_price'] * ($row['discount'] / 100))) * $row['cart_quantity']);
                                ?>
                                <div class="cart__dropdown__item">
                                    <img src="../assets/img/image_products/<?php echo htmlentities($row['product_image_1']); ?>" class="cart__dropdown__image" alt="" srcset="">
                                    <div class="cart__dropdown__content">
                                        <a href="product_detail.php?product_id=<?php echo htmlentities($row['product_id']); ?>" class="cart__dropdown__content-name">
                                            <?php echo htmlentities($row['product_name']); ?>
                                        </a>
                                        <div class="cart__dropdown__content-price">
                                            <?php echo htmlentities($row['cart_quantity']); ?>
                                        </div>
                                        <div class="cart__dropdown__content-price">
                                            $<?php echo htmlentities(($row['product_price'] - ($row['product_price'] * ($row['discount'] / 100))) * $row['cart_quantity']); ?>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            <?php } ?>
                        </div>    
                        <div class="cart__dropdown__selection">
                            <a href="page_carts.php" class="cart__dropdown__button">View Cart</a>
                            <a href="checkout.php" class="cart__dropdown__button">Checkout</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<body>
    <div class=".container-fluid">
        <div class="shop">
            <img id="banner" src="../assets/img/others/banner.png">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item ml-5"><i class="fas fa-home" aria-hidden="true"></i></li>
                    <li class="breadcrumb-item active" aria-current="page">Category</li>
                </ol>
            </nav>
        </div>
    </div>
    <div class="row mt-5 ml-4">
        <br><br>
        <div class="grid-container">
            <?php
            $infor_product_category = "product_id, product_name, product_price, product_image_1, discount";
            $query_products = mysqli_query($con, "SELECT " . $infor_product_category . " FROM products, product_types, coupons WHERE products.product_type_id=product_types.product_type_id AND product_types.coupon_id=coupons.coupon_id AND product_types.product_type_id=" . $_GET['product_type_id'] . ";");
            while ($row = mysqli_fetch_array($query_products)) {
                ?>
                <a href="product_detail.php?product_id=<?php echo htmlentities($row['product_id']); ?>" class="product-content">
                    <div class="imageproduct text-center"><img class="radius-product" src="../assets/img/image_products/<?php echo htmlentities($row['product_image_1']); ?>"/>
                        <div class="productname text-center mt-2"><?php echo htmlentities($row['product_name']); ?></div>
                    </div>
                    <div>
                        <del class="margimobile">$<?php echo htmlentities($row['product_price']); ?></del>
                        <strong>$<?php echo htmlentities($row['product_price'] - ($row['product_price'] * ($row['discount'] / 100))); ?></strong>
                    </div>
                </a>
            <?php } ?>
        </div>
        <script>
                $(document).ready(function () {
                    $('#burger-top').click(() => {
                        // $(".modal-overlay").show();
                        $('#burger-top').css('display', 'none');
                        $('#close-top').css('display', 'inline-block');
                        $(".panel").slideToggle();
                    });

                    $('#close-top').click(() => {
                        $('#burger-top').css('display', 'inline-block');
                        $('#close-top').css('display', 'none');
                        $(".panel").slideToggle();
                    });

                    // Shopping cart dropdown
                    $('#topnav__item__cart').click(() => {
                        $('.cart__dropdown').slideDown();

                    });

                    $(document).click(function (e) {
                        if ($(e.target).is('.cart__dropdown, #topnav__item__cart *'))
                            return;
                        $('.cart__dropdown').slideUp();
                    });


                    // $('#topnav__item__cart').click(() => {
                    //     $('.cart__dropdown').slideUp();
                    // })

                    //Sticky navbar
                    const navbarOffset = $('.navbar__topnav').offset();
                    window.onscroll = function () {
                        StickNavBar(navbarOffset.top)
                    };

                    // console.log(offset.top);
                });


                function StickNavBar(navbarOffset) {
                    if (window.pageYOffset >= 80) {
                        $('.navbar__topnav').addClass('navbar__topnav-sticky ');
                        $(".panel").addClass('panel-stickey');

                    } else {
                        $('.navbar__topnav').removeClass('navbar__topnav-sticky ');
                        $(".panel").removeClass('panel-stickey');

                    }
                }

                function RemoveDropDownItem(id) {
                    $.ajax({
                        url: '/cart/remove/' + id,
                        type: 'GET'
                    }).done(function (response) {
                        RemoveItemInCart(response);
                    });
                }

                function RemoveItemInCart(response) {
                    var newDropDownItems = $('.cart__dropdown__list', $($.parseHTML(response)));
                    if (newDropDownItems) {
                        $('.cart__dropdown__list').empty();
                        $('.cart__dropdown__list').append(newDropDownItems);
                    }

                    var newCartItems = $('#changing-cart', $($.parseHTML(response)));
                    if (newCartItems) {
                        $('#changing-cart').empty();
                        $('#changing-cart').append(newCartItems);
                    }
                }
    </script>
</body>
</html>