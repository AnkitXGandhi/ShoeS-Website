<?php
require('connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NIKE</title>
    <link rel="stylesheet" href="loginstyle.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="image/logo.png">
</head>

<body>
    <section>
        <nav>
            <div class="logo">
                <h1>Shoe<span>s</span></h1>
            </div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#products">Products</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#reviews">Reviews</a></li>
                <li><a href="#services">Services</a></li>
            </ul>
            <div class="icons">
                <i class="fa-solid fa-user"></i>
            </div>
        </nav>

    </section>
    <section>
        <div class="login_form">
            <div class="left">
                <img src="image/logshoes.png" alt="">
            </div>
            <div class="right">
                <h1>Welcome Back!</h1>
                <form action="login_register.php" method="POST">
                    <p>User Name</p>
                    <div class="user">
                        <i class="fa-solid fa-user"></i>
                        <input type="text" name="user_name" placeholder="User Name" class="username">
                    </div>
                    <p class="password_tag">Password</p>
                    <div class="password">
                        <i class="fa-solid fa-lock"></i>
                        <input type="text" name="password" placeholder="Password">
                    </div>
                    <br>
                    <p class="forget">New User? <a href="register_pg.php">Create Account</a></p>
                    <button type="submit" name="login">Login</button>

                </form>
            </div>
        </div>
        
    </section>
    <?php
    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in']==true){
        echo "<h1> WELCOME TO THE WEBSITE - $_SESSION[username]</h1>";
    }
?>
</body>

</html>