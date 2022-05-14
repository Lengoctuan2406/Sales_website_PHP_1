<?php session_start();
include('../Database/connect.php');
// Code cho login 
function test_input($data)
{
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
        $ret = mysqli_query($con, "SELECT account_id, account_name, role_id  FROM account WHERE email='$email' and password='$password'");
        $num = mysqli_fetch_array($ret);
        if ($num > 0) {
            $_SESSION['account_id'] = $num['account_id'];
            $_SESSION['account_name'] = $num['account_name'];
            $_SESSION['role_id'] = $num['role_id'];
            if ($_SESSION['role_id'] == 0) {
                header("location:page_product.php");
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
?>
<?php
include('Header/header.php');
?>
<body>
    <hr>
    <div>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" ?>
            <div>
                <input name="email" type="email" placeholder="name@example.com" />
                <label for="inputEmail">Enter your email</label>
            </div>

            <div>
                <input name="password" type="password" placeholder="Password" required />
                <label for="inputPassword">Enter your password</label>
            </div>

            <div>
                <a href="password-recovery.php">Forgot password</a>
                <button name="login" type="submit">Login</button>
            </div>
        </form>
    </div>
    <div>
        <div><a href="signup.php">Create a new account</a></div>
        <div><a href="index.php">Return your page</a></div>
    </div>
</body>
</html>