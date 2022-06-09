<?php
include('handling/handling_signup.php');
?>
﻿<!DOCTYPE html>
<html lang="en">
    <!-- Head -->
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1, shrink-to-fit=no">
        <title>Messenger</title>
        <!-- Template core CSS -->
        <!--<link rel="stylesheet" href="../Styles/CSS/home.css">-->
    </head>
    <!-- Head -->
    <body>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <!-- Name -->
            <div>
                <input name="name" type="text" placeholder="Nhập tên của bạn">
            </div>
            <!-- Email -->
            <div>
                <input name="email" type="email" placeholder="Nhập email của bạn">
            </div>
            <!-- Password -->
            <div>
                <input name="password" type="password" placeholder="Nhập mật khẩu của bạn">
            </div>
            <!-- Submit -->
            <button type="submit" name="create_account">Tạo tài khoản</button>
        </form>
        <!-- Text -->
        <p class="text-center">
            Bạn đã có tài khoản? <a href="login.php">Đăng nhập</a>.
        </p>
    </body>
</html>