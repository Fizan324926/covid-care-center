<?php

session_start();
if(count($_POST)>0)
{
    extract($_POST);
    include 'connection.php';
    $username=$_POST['s-username'];
    $pass=$_POST['s-password'];
    $sql=mysqli_query($conn,"SELECT * FROM users where username='$username' and pass='$pass'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        $_SESSION["username"] = $row['username'];
        $_SESSION["pass"]=$row['pass'];
       
         
    }
    else
    {
        echo "<script>alert('Invalid Username and Password')</script>";
    }
}
if(isset($_SESSION['username'])){header("Location: home.php");}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="styles.css" type="text/css">
    <script src="https://kit.fontawesome.com/d73fda720e.js" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
   
</head>

<body>

    <section>
       
        <video autoplay muted loop id="myVideo">
            <source src="assets/cells.mp4" type="video/mp4">
          </video>
        <div class="container">
            <div class="user signinBx">
                <div class="imgBx">
                    <img src="assets/img2.jpg" alt="Sign in Image">
                </div>
                <div class="formBx">
                
                    <form method='post'>
                        
                        <h2>Sign In</h2>
                        <input id="l-username" type="text" placeholder="Username" name="s-username">
                        <input id="l-pass" type="password" placeholder="Password" name="s-password">
                        <input id="l-button" type="submit" name="submit" value="Login">
                        <p class="signup">don't have an account? <a href="#" onclick="toggleForm()">Sign Up</a></p>
                    </form>
                </div>
            </div>
            <div class="user signupBx">
                <div class="formBx">
                    
                    <form action="signup.php" method="post"  name="signup">
                        <h2>Create an account</h2>
                        <input id="s-name" type="text" placeholder="Full Name" name="fullname">
                        <input id="s-username" type="text" placeholder="Username" name="username" >
                        <input id="s-email" type="email" placeholder="Email Address" name="email" >
                        <input id="s-pass" type="password" placeholder="Create Password" name="password_1">
                        <input id="s-repass" type="password" placeholder="Confirm Password" name="password_2">
                        <input id="signupbtn" type="submit" value="Sign Up" name="reg_user">
                        <p  class="signup">Already have an account? <a href="#" onclick="toggleForm()">Log in</a></p>
                    </form>
                </div>
                <div class="imgBx">
                    <img src="assets/signin-img.jpg" alt="Sign in Image">
                </div>
            </div>
        </div>
    </section>
    <script>
        function toggleForm() {
            container = document.querySelector(".container");
            container.classList.toggle("active");
            section = document.querySelector("section");
            section.classList.toggle("active");
        }
    </script>
</body>

</html>