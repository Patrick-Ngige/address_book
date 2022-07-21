<?php
 include 'connect.php';
 if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from information where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header('location:home.php');
    }else{
        die("Connection failed: " . mysqli_connect_error());
    }
 }


?>
