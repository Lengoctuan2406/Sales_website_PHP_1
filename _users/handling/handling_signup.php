<?php

session_start();
include('../database/connect.php');

if (isset($_POST['create_account'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    // kiểm tra email có hợp lệ
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $ret = mysqli_query($con, "SELECT * FROM accounts WHERE email='$email';");
        $num = mysqli_fetch_array($ret);
        if ($num == 0) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $currentTime = date('Y-m-d H:i:s', time());
            $ret1 = mysqli_query($con, "INSERT INTO accounts (account_name, email, password, created_date) VALUES ('$name', '$email', '$password', '$currentTime');");
            if ($ret1 > 0) {
                echo "<script>alert('Tạo tài khoản thành công!');</script>";
            } else {
                echo "<script>alert('Tạo tài khoản không thành công!');</script>";
            }
        } else {
            echo "<script>alert('Email đã tồn tại!');</script>";
        }
    } else {
        echo "<script>alert('Email không đúng định dạng!');</script>";
    }
}