<?php
include 'signuplogin.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Register</title>
</head>
<body>
    <header class="container mb-5 pt-2">
     <h1 class="text-center">Sign Up Page</h1>
     
    </header>

    <div class="container">
        <div class="row">
            <p>Please use the form below to register. <strong>Please note: </strong></p>
            <ul class="ms-5">
                <li>Each user must have a unique email address. Multiple accounts for the same email address are not allowed.</li>
                <li>Your password must be at least 8 characters long</li>
            </ul>
        </div>
        <div class="row">
            <div class="col align-items-center p-2 mx-auto mb-5 rounded" style="max-width:50%; background-color: #f2f2f2">
                <form method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Jane Doe" required>
                </div>
                <div class="mb-3">
                    <label for="phonenum" class="form-label">Nomor Telepon</label>
                    <input type="text" class="form-control" name="phonenum" placeholder="08xxxxxxxxxx" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="jane.doe@gmail.com" required>
                </div>  
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Min. 8 karakter" minlength="8" required>
                </div>
                <div class="mb-3">
                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="confirmPassword" id="confirmPassword" minlength="8" required>
                <?php include'errors.php'; ?>
                </div>
                    <button type="submit" name="reg_user" id="submit" class="btn btn-primary mb-3">Register</button>
                    <p>Already a member? <a href="login.php">Log In</a></p>
                </form>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<script src="script.js"></script>
</body>
</html>