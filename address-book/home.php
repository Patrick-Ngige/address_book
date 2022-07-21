<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Address-book</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

<a href="user.php" class="btn btn-info my-2" role="button" data-bs-toggle="button">Add address</a>

<div class="d-grid gap-2 d-md-flex justify-content-md-end">
<a href="xml.php" class="btn btn-success my-2" role="button" data-bs-toggle="button">XML file</a>
  <a href="json.php" class="btn btn-success my-2" role="button" data-bs-toggle="button">JSON file</a>
</div>

<div class="container">
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col"></th>
      <th scope="col">Name</th>
      <th scope="col">First Name</th>
      <th scope="col">Email</th>
      <th scope="col">Street</th>
      <th scope="col">Zip-code</th>
      <th scope="col">City</th>
      <th scope="col">Edit</th>
    </tr>
  </thead>
  <tbody class="table-group-divider">

    <?php
    include 'connect.php';
    $sql="Select * from information ";
    $result=mysqli_query($conn,$sql);
    if($result){
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
            $name=$row['name'];
            $fname=$row['fname'];
            $email=$row['email'];
            $street=$row['street'];
            $zipcode=$row['zipcode'];
            $city=$row['city'];
            echo ' <th scope="row">'.$id.'</th>
            <td>'.$name.'</td>
            <td>'.$fname.'</td>
            <td>'.$email.'</td>
            <td>'.$street.'</td>
            <td>'.$zipcode.'</td>
            <td>'.$city.'</td>
          <td>
          <a href="update.php? updateid='.$id.'" class="btn btn-primary btn-sm" role="button" data-bs-toggle="button">Update</a>
          <a href="delete.php? deleteid='.$id.'" class="btn btn-danger btn-sm" role="button" data-bs-toggle="button">Delete</a>
          </td>
          </tr>';
        }
    
    }


?>

  </tbody>
</table>

</div>
</body>
</html>
