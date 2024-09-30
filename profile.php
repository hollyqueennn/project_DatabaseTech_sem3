<?php
include("signuplogin.php");
if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
    $query = "SELECT * FROM anggota WHERE email_anggota = '$email'";
    $result = mysqli_query($conn, $query);
    $user = mysqli_fetch_assoc($result);
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

  <div class="container">
    <?php
        if (isset($_GET["msg"])) {
        $msg = $_GET["msg"];
         echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        ' . $msg . '
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
    ?>
    <div class="profile-info">
        <p class="profile-info-label m-1">Nama</p>
        <div class="col-5 border rounded">
            <p class="m-2"><?php echo $user["nama_anggota"] ?>
        </p></div>
    </div>
    <div class="profile-info">
        <p class="profile-info-label m-1">Nomor Telepon</p>
        <div class="col-5 border rounded">
            <p class="m-2"><?php echo $user["no_telp_anggota"] ?>
        </p></div>
    </div>
    <div class="profile-info">
        <p class="profile-info-label m-1">Email</p>
        <div class="col-5 border rounded"><p class="m-2"><?php echo $user["email_anggota"] ?></p></div>
    </div>
    <a href="updateprofile.php?email=<?php echo $user['email_anggota'] ?>"><button class="btn btn-success my-2">Update</button></a>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>