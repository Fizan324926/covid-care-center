<?php 
if(isset($_POST['reg_user'])){
    extract($_POST);
include("connection.php");
if(!empty($_POST['fullname'])&&!empty($_POST['username'])&&!empty($_POST['email'])&&!empty($_POST['password_1'])&&!empty($_POST['password_2'])){
    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $pass=$_POST['password_1'];
    $repass=$_POST['password_2'];
    $sql=mysqli_query($conn,"SELECT * FROM users where username='$username'");
    if(mysqli_num_rows($sql)>0)
    {
        echo "<script>alert('Username Exists,choose another.')</script>";
        exit;
    }
    else{
        if(!$pass==$repass){
            echo "<script>alert('password doesn't match')</script>";
            exit;
        }
        $query="INSERT INTO users(fullname, username, email,pass ) VALUES ('$fullname', '$username', '$email', '$pass')";
        $sql=mysqli_query($conn,$query) or die("Could Not Perform the Query");
        $_SESSION["username"] = $username;
        $_SESSION["pass"]=$pass;
        if(isset($_SESSION['username'])){
            header ("Location: home.php");
        }
    }
    
    
}
else{
    echo "<script>alert('values can't be ampty')</script>";
}

}


?>