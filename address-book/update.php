<?php
include 'connect.php';
$id=$_GET['updateid'];
$sql="select * from information where id=$id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
    $name=$row['name'];
    $fname=$row['fname'];
    $email=$row['email'];
    $street=$row['street'];
    $zipcode=$row['zipcode'];
    $city=$row['city'];
if(isset($_POST['submit'])){
        $name=$_POST['name'];
        $fname=$_POST['fname'];
        $email=$_POST['email'];
        $street=$_POST['street'];
        $zipcode=$_POST['zipcode'];
        $city=$_POST['city'];

    $sql="update information set id=$id,name='$name',fname='$fname',email='$email',street='$street',zipcode=$zipcode,city='$city' where id=$id";
    $result=mysqli_query($conn,$sql);
    if($result){
        header ('location:home.php');
    }else{
        die("Connection failed: " . mysqli_connect_error());
    }
 }

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Address-book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container my-5">
        <form method="post">
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" required value=<?php echo $name?>>
        </div>
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="fname" autocomplete="off" required value=<?php echo $name?>>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" required value=<?php echo $email?>>
        </div>
        <div class="mb-3">
            <label class="form-label">Street</label>
            <input type="text" class="form-control" placeholder="Enter your street" name="street" autocomplete="off" required value=<?php echo $street?>>
        </div>
        <div class="mb-3">
            <label class="form-label">Zip-code</label>
            <input type="text" class="form-control" placeholder="Enter your zipcode" name="zipcode"  autocomplete="off" required value=<?php echo $zipcode?>>
        </div>
        <div class="mb-3">
        <label class="form-label my-3">City
                <?php
                $sql1= "select city from cities";
                $resultSet= mysqli_query($conn,$sql1);
                ?>
            <select name="city">
              <?php  while ($row=mysqli_fetch_assoc($resultSet)){
                $city=$row['city'];
                echo "<option value='$city'>$city</option>";
              }
            ?>
            </select>
            </label>
        </div>
        <button type="submit" class="btn btn-success my-2" name="submit">update</button>
        </form>
    </div>
</body>

</html>