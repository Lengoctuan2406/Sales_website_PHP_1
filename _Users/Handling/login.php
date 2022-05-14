<?php

session_start();
include('../Database/connect.php');

// Code cho login 
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_POST['login'])) {
    $email = test_input($_POST['email']);
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    // kiểm tra e-mail
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $password = test_input($_POST['password']);
        $ret = mysqli_query($con, "select account_id, account_name, role from accounts where email='$email' and password='$password'");
        $num = mysqli_fetch_array($ret);
        if ($num > 0) {
            $_SESSION['account_id'] = $num['account_id'];
            $_SESSION['account_name'] = $num['account_name'];
            $_SESSION['role'] = $num['role'];
            if ($_SESSION['role'] == 0) {
                header("location:index.php");
            } else {
                header("location:../_Admin/index.php");
            }
        } else {
            echo "<script>alert('Invalid password');</script>";
        }
    } else {
        echo "<script>alert('Invalid email');</script>";
    }
}