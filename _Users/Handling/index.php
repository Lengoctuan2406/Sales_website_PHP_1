<?php
session_start();
include('../Database/connect.php');
$query_category = mysqli_query($con, "select * from categorys");
$query_products = mysqli_query($con, "select * from products");