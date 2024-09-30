<?php
include("signuplogin.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>Log In</title>
</head>
<body>
    <header class="container mb-5 pt-2">
     <h1 class="text-center">Log In Page</h1>
     
    </header>

    <div class="container">
            <div class="col align-items-center p-2 mx-auto rounded" style="max-width:50%; background-color: #f2f2f2">
                <form method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="email" placeholder="jane.doe@gmail.com" required>
                </div>  
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Min. 8 karakter" minlength="8" required>
                </div>
                <?php include'errors.php'; ?>
                <button type="submit" name="login_user" id="submit" class="btn btn-primary h-25 w-auto mb-3">Log In</button>
                    <p>Not yet a member? <a href="signup.php">Sign up</a></p>
                </form>
                
            </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


<script src="script.js"></script>
</body>
</html>