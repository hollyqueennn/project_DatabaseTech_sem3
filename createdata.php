<?php
include "db_conn.php";

if (isset($_POST["submit"])) {
   $isbn = $_POST['isbn'];
   $judul = mysqli_real_escape_string($conn, $_POST['judul']);
   $penulis = $_POST['penulis'];
   $tahun_terbit = $_POST['tahun_terbit'];
   $text = "SELECT id_penerbit FROM `penerbit` WHERE nama_penerbit = '$_POST[penerbit]'";
   $penerbit = mysqli_fetch_array(mysqli_query($conn, $text));
   $stok = $_POST['stok'];

   if(empty($isbn) || empty($judul) || empty($penulis) || empty($tahun_terbit) || empty($penerbit) || empty($stok)) {
      echo "<script>alert('Please fill out all the fields')</script>";
   }
   else {

      $sql = "INSERT INTO `buku`(`isbn`, `judul_buku`, `penulis_buku`, `tahun_terbit`, `id_penerbit`, `stok_buku`) VALUES ('$isbn','$judul', '$penulis', $tahun_terbit, '$penerbit[0]', $stok)";

      $result = mysqli_query($conn, $sql);
   
      if ($result) {
         header("Location: index.php?");
      } else {
         echo "Failed: " . mysqli_error($conn);
      }

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

   <title>Tambah Buku</title>
</head>

<body>
   <nav class="navbar navbar-light justify-content-center fs-3 mb-5" style="background-color: #00ff5573;">
      Tambah Buku Baru
   </nav>

   <div class="container">
      <div class="text-center mb-4">
         <p class="text-muted">Isi form berikut untuk memasukkan data buku</p>
      </div>

      <div class="container d-flex justify-content-center my-5">
         <form action="" method="post" style="width:50vw; min-width:300px;"> 
               <div class="mb-3">
                  <label class="form-label">ISBN:</label>
                  <input type="text" class="form-control" name="isbn" placeholder="ISBN">
               </div>

               <div class="mb-3">
                  <label class="form-label">Judul:</label>
                  <input type="text" class="form-control" name="judul" placeholder="Judul Buku">
               </div>
            
            <div class="mb-3">
               <label class="form-label">Penulis:</label>
               <input type="text" class="form-control" name="penulis" placeholder="Penulis Buku">
            </div>

            <div class="mb-3">
               <label class="form-label">Tahun Terbit:</label>
               <input type="number" min="1902" max="2100" step="1" class="form-control" name="tahun_terbit" placeholder="Tahun Terbit">
            </div>

            <div class="mb-3">
               <label class="form-label">Penerbit:</label>
               <input type="text" class="form-control" name="penerbit" placeholder="Penerbit Buku">
            </div>

            <div class="mb-3">
               <label class="form-label">Stok:</label>
               <input type="number" min="1" class="form-control" name="stok" placeholder="Stok">
            </div>

            <div>
               <button type="submit" class="btn btn-success" name="submit">Save</button>
               <a href="index.php" class="btn btn-danger">Cancel</a>
            </div>
         </form>
      </div>
   </div>

   <!-- Bootstrap -->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>