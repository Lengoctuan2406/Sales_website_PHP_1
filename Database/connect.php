<?php

define('DB_SERVER', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
//tên database: ví dụ loginsystem
define('DB_NAME', 'loginsystem');
$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
//kiểm tra kết nối
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}