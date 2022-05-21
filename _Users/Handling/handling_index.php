<?php
session_start();
include('../database/connect.php');
$query_category = mysqli_query($con, "SELECT * FROM categorys");
$query_products = mysqli_query($con, "SELECT * FROM products");