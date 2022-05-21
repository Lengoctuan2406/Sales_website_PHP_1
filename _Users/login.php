<?php 
include('handling/handling_login.php');
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
    <!--<link rel="stylesheet" href="../Styles/CSS/home.css">-->
</head>
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