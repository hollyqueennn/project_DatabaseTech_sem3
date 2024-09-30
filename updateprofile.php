<?php 
include("db_conn.php");
$email = $_GET['email'];

if(isset($_POST["submit"])) {
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $phonenum = $_POST["phonenum"];
    $query = "UPDATE `anggota` SET `nama_anggota` = '$name', `no_telp_anggota` = '$phonenum' WHERE email_anggota = '$email'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        header("Location: profile.php?msg=Data updated successfully");
    } else {
        echo "Failed: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <title>Profile Page</title>
</head>

<body>
  <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
    Profile
  </nav>

  <?php
  $sql = "SELECT nama_anggota, no_telp_anggota, email_anggota FROM anggota WHERE email_anggota = '$email'";
  $res = mysqli_query($conn, $sql);
  $user = mysqli_fetch_assoc($res);
  ?>

  <div class="container d-flex justify-content-center my-5">
   <form method="post" style="width: 50vw; min-width: 300px;"> 
   <div class="profile-info mb-3">
        <label for="name" class="form-label m-1">Nama</label>
        <input type="text" class="col-5 border rounded form-control" name="name" value="<?php echo $user['nama_anggota'] ?>">
    </div>
    <div class="profile-info">
        <label for="phonenum" class="form-label m-1">Nomor Telepon</label>
        <input type="text" class="col-5 border rounded form-control" name="phonenum" value="<?php echo $user['no_telp_anggota'] ?>">
    </div>
    <div class="profile-info">
        <p class="profile-info-label m-1">Email</p>
        <div class="col-5 border rounded"><p class="m-2"><?php echo $user['email_anggota'] ?></p></div>
    </div>
    <div class="my-2">
        <button type="submit" class="btn btn-success" name="submit">Update</button>
        <a href="profile.php" class="btn btn-danger">Cancel</a>
    </div>
   </form>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>