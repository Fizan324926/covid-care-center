<?php 
include_once 'classes/crud.php';
include_once 'connection.php';
if(isset($_POST['p-addbtn'])){
    
    extract($_POST);
    if(!empty($_POST['fullname'])&&!empty($_POST['age'])&&!empty($_POST['contact'])&&!empty($_POST['test'])&&!empty($_POST['bed'])){
        
        $fullname=$_POST['fullname'];
        $age=$_POST['age'];
        $gender=$_POST['gender'];
        $contact=$_POST['contact'];
        $test=$_POST['test'];
        $ward=intval($_POST['ward']);
        
        $bed=intval($_POST['bed']);
        $condition=$_POST['condition'];
        $query="INSERT INTO patient(fullname, age, gender,contact,testno,patientstatus,bedno,wardid ) VALUES ('$fullname', '$age', '$gender', '$contact', '$condition', '$test', '$bed', '$ward')";
        $sql=mysqli_query($conn,$query) or die("Could Not Perform the Query");
         
        if(!$sql){
        die("<script>alert('error')</script>");
    }
    else{
        echo "<script>alert('data added')</script>";
        
        
    }
    }
    else{
        echo "<script>alert('Values cant be empty')</script>";
        
        
    }
}
elseif(isset($_POST['update'])){}
elseif(isset($_POST['delete'])){

}



// Staff Data 


if(isset($_POST['s-addbtn'])){
    
    extract($_POST);
    if(!empty($_POST['name'])&&!empty($_POST['contact'])&&!empty($_POST['address'])){
        
        $fullname=$_POST['name'];
        $ward=$_POST['ward'];
        $gender=$_POST['gender'];
        $contact=$_POST['contact'];
        $address=$_POST['address'];
        
        $query="INSERT INTO staff(fullname, gender,contact, `address`,wardid ) VALUES ('$fullname',  '$gender', '$contact', '$address', '$ward')";
        $sql=mysqli_query($conn,$query) or die("Could Not Perform the Query");
         
        if(!$sql){
        die("<script>alert('error')</script>");
    }
    else{
        echo "<script>alert('data added')</script>";
        
    }
    }
    else{
        echo "<script>alert('Values cant be empty')</script>";
        
        
    }
}


// ward data 
if(isset($_POST['w-addbtn'])){
    
    extract($_POST);
    if(!empty($_POST['name'])&&!empty($_POST['beds'])&&!empty($_POST['staff']&&!empty($_POST['condition']))){
        
        $fullname=$_POST['name'];
        $beds=$_POST['beds'];
        $staff=$_POST['staff'];
        $condition=$_POST['condition'];
        
        
        $query="INSERT INTO wards(wardname, wardcondition,beds,staff ) VALUES ('$fullname', '$condition', '$beds', '$staff')";
        $sql=mysqli_query($conn,$query) or die("Could Not Perform the Query");
         
        if(!$sql){
        die("<script>alert('error')</script>");
    }
    else{
        echo "<script>alert('data added')</script>";
        
    }
    }
    else{
        echo "<script>alert('Values cant be empty')</script>";
        
        
    }
}
header:'Location:home.php';
?>