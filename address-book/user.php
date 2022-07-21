<?php
include 'connect.php';
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $street=$_POST['street'];
    $zipcode=$_POST['zipcode'];
    $city=$_POST['city'];

    $sql="insert into information (name,fname,email,street,zipcode,city)
          values ('$name','$fname','$email','$street',$zipcode,'$city')";
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
            <input type="text" class="form-control" placeholder="Enter your name" name="name" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label class="form-label">First Name</label>
            <input type="text" class="form-control" placeholder="Enter your name" name="fname" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Email</label>
            <input type="text" class="form-control" placeholder="Enter your email" name="email" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Street</label>
            <input type="text" class="form-control" placeholder="Enter your street" name="street" autocomplete="off" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Zip-code</label>
            <input type="text" class="form-control" placeholder="Enter your zipcode" name="zipcode" autocomplete="off" required>
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
       
        <button type="submit" class="btn btn-success my-2" name="submit">add</button>
</form>
    </div>
</body>

</html>