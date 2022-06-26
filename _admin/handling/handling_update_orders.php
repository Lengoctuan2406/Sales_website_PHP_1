<?php

session_start();

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if (isset($_GET['order_id'])) {
    $_SESSION['update_by_id'] = $_GET['order_id'];
}

if (isset($_POST['update'])) {
    $order_status_id = test_input($_POST['order_status_id']);
    $purchase_history_total_price = $_POST['purchase_history_total_price'];
    if ($order_status_id == 3) {
        $ret = mysqli_query($con, "SELECT * FROM orders WHERE order_id=" . $_SESSION['update_by_id'] . ";");
        while ($num = mysqli_fetch_array($ret)) {
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $currentTime = date('Y-m-d H:i:s', time());
            $insert_purchase_history = mysqli_query($con, "INSERT INTO purchases_history (account_id, purchase_history_product_all_id, purchase_history_all_quantity, purchase_history_name, purchase_history_address, purchases_history_phone, purchase_history_total_price, created_date_purchase_history) VALUES "
                    . "('" . $num['account_id'] . "', '" . $num['order_product_all_id'] . "', '" . $num['order_all_quantity'] . "', '" . $num['order_name'] . "', '" . $num['order_address'] . "', '" . $num['order_phone'] . "', '$purchase_history_total_price', '$currentTime');");
        }
    }
    $update_order = mysqli_query($con, "UPDATE orders SET order_status_id='$order_status_id' WHERE order_id=" . $_SESSION['update_by_id'] . ";");
    if ($update_order) {
        echo "<script>alert('Update order successful!');</script>";
    } else {
        echo "<script>alert('Update order failed!');</script>";
    }
}