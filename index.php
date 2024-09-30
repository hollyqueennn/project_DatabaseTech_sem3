<?php
include "signuplogin.php";
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

  <title>Library Database</title>
</head>

<body>
  <nav class="navbar navbar-expand navbar-light mb-5" style="background-color: #00ff5573;">
    <div class= "container-fluid"> 
      <div class="d-flex justify-content-center">
        <div class="container">
          <p class="navbar-brand fs-3">Library</p>
        </div>
      </div>
    <div class="navbar-nav d-flex justify-content-end">
      <a href="profile.php" class="nav-link mx-1 link-dark" target="_blank" rel="noopener no-referrer"><i class="fa-solid fa-user-circle fs-3 me-3"></i></a>
      <a href="logout.php" class="nav-link link-dark"><i class="fa-solid fa-sign-out fs-3 me-3"></i></a>
    </div>
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
    <a href="createdata.php" class="btn btn-dark mb-3">Add New Book</a>

    <table class="table table-hover text-center">
      <thead class="table-dark">
        <tr>
          <th scope="col">ISBN</th>
          <th scope="col">Judul</th>
          <th scope="col">Penulis</th>
          <th scope="col">Tahun Terbit</th>
          <th scope="col">Penerbit</th>
          <th scope="col">Stok</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM `buku` NATURAL JOIN `penerbit` WHERE id_penerbit = id_penerbit";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
          <tr>
            <td><?php echo $row["isbn"] ?></td>
            <td><?php echo $row["judul_buku"] ?></td>
            <td><?php echo $row["penulis_buku"] ?></td>
            <td><?php echo $row["tahun_terbit"] ?></td>
            <td><a href="penerbit_showdata.php?nama_penerbit=<?php echo $row["nama_penerbit"] ?>" target="_blank" rel="noopener noreferrer" style="text-decoration: none;"><?php echo $row["nama_penerbit"]?></a></td>
            <td><?php echo $row["stok_buku"] ?></td>
            <td class="col-1">
              <a href="updatedata.php?isbn=<?php echo $row["isbn"] ?>" class="link-dark"><i class="fa-solid fa-pen-to-square fs-5 me-3"></i></a>
              <a href="deletedata.php?isbn=<?php echo $row["isbn"] ?>" class="link-dark"><i class="fa-solid fa-trash fs-5"></i></a>
            </td>
          </tr>
        <?php
        }
        ?>
      </tbody>
    </table>
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>