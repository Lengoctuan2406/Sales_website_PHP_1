<?php
include('Handling/handling_index.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous"></head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script> 
    <link rel="stylesheet" href="../assets/css/home.css"> 
</head>
<body>
    <div>
        <?php
        if (!isset($_SESSION['account_id'])) {
            ?>
            <a href="login.php">Login</a>
            <?php
        } else {
            ?>
            <a href="page_product.php">Hello <?php echo $_SESSION['account_name']; ?></a>
            <?php
        }
        ?>
        <hr>
    </div>
    <div class=".container-fluid float-md-start">
        <!-- Slideshow -->
        <div class="slideshow-container slide-wrapper">
            <div class="mySlides">
                <div class="numbertext">1 / 3</div>
                <img src="../assets/image/slide1.png" style="width:100%">
            </div>
            <div class="mySlides">
                <div class="numbertext">2 / 3</div>
                <img src="../assets/image/slide2.png" style="width:100%">
            </div>
            <div class="mySlides">
                <div class="numbertext">3 / 3</div>
                <img src="../assets/image/slide3.png" style="width:100%">
            </div>
            <div style="text-align:center" class="dot-slide">
                <span class="dot" onclick="currentSlide(1)"></span>
                <span class="dot" onclick="currentSlide(2)"></span>
                <span class="dot" onclick="currentSlide(3)"></span>
            </div>
            <!-- các nút tiếp theo và trước đó -->
            <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
            <a class="next" onclick="plusSlides(1)">&#10095;</a>
        </div>
        <br>
    </div>    
    <!-- Slideshow thể loại hình ảnh -->
    <div class="category--container">
        <a href="">
            <div class="category--item">
                <img class="imageradius" src="../assets/image/banner-cat.png" alt="category1">
            </div>
        </a>
        <a href="">
            <div class="category--item">
                <img class="imageradius" src="../assets/image/banner-toys.png" alt="category2">
            </div>
        </a>

        <a href="">
            <div class="category--item">
                <img class="imageradius" src="../assets/image/banner-dog.png" alt="category3">
            </div>
        </a>
    </div>
    <!-- thông tin nhà cung cấp -->
    <div class="supplier--container">
        <div class="supplier--photo">
            <img class="imageradius" style="max-width: 800px;" src="../assets/image/slide2.png" alt="supplier-photo">
        </div>
        <div class="supplier--info">
            <h3>BEST SUPPLIER</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit quibusdam aut fugit asperiores consectetur
                error ab! Culpa laborum dolorem, qui eaque, recusandae assumenda voluptatibus debitis cupiditate, facilis
                voluptatem totam reprehenderit?
            </p>
        </div>
    </div>

    <!--sản phẩm top-->
    <div id="trendingProducts">
        <p class="h2 text-center">Trending Products</p>
    </div>
    <div class="row ml-0 mr-0 justify-content-center" id="categories">
        <?php
        while ($row = mysqli_fetch_array($query_category)) {
            ?>
            <div class="box-e col col-lg-2">
                <a href="" class="custom-underline"><?php echo htmlentities($row['category_name']);?></a>
            </div>
        <?php } ?>
    </div>

    <!--một số hình ảnh sản phẩm-->
    <div class="products__grid--container">
        <?php
        while ($row = mysqli_fetch_array($query_products)) {
            ?>
        <a style="color: rgb(22, 22, 22)" href="">
            <img class="imageradius" src="../Styles/Image/<?php echo htmlentities($row['thumnail']);?>" alt="product1">
            <p class="h6 text-center product-name"><?php echo htmlentities($row['product_name']);?></p>
            <p class="h6 text-center product-price">
                <del style="margin-right: 4px"><?php echo htmlentities($row['price']);?></del>
                <strong><?php echo htmlentities($row['price']*0.8);?></strong>
            </p>
        </a>
        <?php } ?>
    </div>

    <!--hiện thị tất cả sản phẩm-->
    <div class="row justify-content-center" id="show-button">
        <button class="show-button" role="button">
            <a href="">Show all</a>
        </button>
    </div>

    <!-- mã giảm giá -->
    <div class="saleoff--container">
        <div class="saleoff--item">
            <img class="imageradius" src="../assets/image/sale-off-1.jpg" alt="saleoff1">
        </div>
        <div class="saleoff--item">
            <img class="imageradius" src="../assets/image/sale-off-2.png" alt="saleoff2">
        </div>
    </div>

    <!-- đối tác của chúng tôi -->
    <div id="partners">
        <p class="h2 text-center">Our Partners</p>
        <p class="h7 text-center">Vision, commitment, partnership</p>
    </div>
    <div class="grid-container partner-photos">
        <div class="col partner-logo">
            <img src="../assets/image/logo1.png" alt="logo1">
        </div>
        <div class="col partner-logo">
            <img src="../assets/image/logo2.png" alt="logo2">
        </div>
        <div class="col partner-logo">
            <img src="../assets/image/logo3.png" alt="logo3">
        </div>
        <div class="col partner-logo">
            <img src="../assets/image/logo1.png" alt="logo4">
        </div>
    </div>
    <br>
    <div class="grid-container partner-photos">
        <div class="col partner-logo">
            <img src="../assets/image/logo4.png" alt="logo5">
        </div>
        <div class="col partner-logo">
            <img src="../assets/image/logo5.png" alt="logo6">
        </div>
        <div class="col partner-logo">
            <img src="../assets/image/logo6.png" alt="logo7">
        </div>
        <div class="col partner-logo">
            <img src="../assets/image/logo7.png" alt="logo8">
        </div>
    </div>

    <!-- theo dõi chúng tôi trên facebook-->
    <br>
    <div class="follow-us">
        <p class="h4 text-center">FOLLOW US ON FACEBOOK</p>
        <div class="follow-photos">
            <div class="follow-content ">
                <img src="../assets/image/follow1.jpg" alt="Slide1">
            </div>
            <div class="follow-content ">
                <img src="../assets/image/follow2.jpg" alt="Slide2">
            </div>
            <div class="follow-content ">
                <img src="../assets/image/follow3.jpg" alt="Slide3">
            </div>
            <div class="follow-content">
                <img src="../assets/image/follow4.jpg" alt="Slide4">
            </div>
        </div>
    </div>
    <script src="../assets/js/home.js"></script>
</body>
</html>