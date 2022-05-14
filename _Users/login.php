<?php 
include('Handling/login.php');
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