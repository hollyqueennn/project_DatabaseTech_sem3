<?php
include("db_conn.php");
session_start();

// initializing variables
$name = "";
$phonenum = "";
$email = ""; 
$password = "";
$confirm = "";
$errors = array();

// REGISTER USER
if (isset($_POST['reg_user'])) {
    // receive all input values from the form
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phonenum = mysqli_real_escape_string($conn, $_POST['phonenum']);
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $confirmPassword = mysqli_real_escape_string($conn, $_POST['confirmPassword']);
  
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($name)) { array_push($errors, "Username is required"); }
    if (empty($phonenum)) { array_push($errors, "Phonenumber is required"); }
    if (empty($email)) { array_push($errors, "Email is required"); }
    if (empty($password)) { array_push($errors, "Password is required"); }
    if ($password != $confirmPassword) {
      array_push($errors, "Password do not match");
    }
  
    // first check the database to make sure 
    // a user does not already exist with the same username and/or email
    $user_check_query = "SELECT * FROM anggota WHERE no_telp_anggota='$phonenum' OR email_anggota='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    $user = mysqli_fetch_assoc($result);
    
    if ($user) { // if user exists
      if ($user['no_telp_anggota'] === $phonenum) {
        array_push($errors, "Phone number already used");
      }
  
      if ($user['email_anggota'] === $email) {
        array_push($errors, "Email already used");
      }
    }
  
    // Finally, register user if there are no errors in the form
    if (count($errors) == 0) {
        $password = md5($password);//encrypt the password before saving in the database
  
        $query = "INSERT INTO anggota (nama_anggota, no_telp_anggota, email_anggota, password_anggota) 
                  VALUES('$name', '$phonenum', '$email', '$password')";
        mysqli_query($conn, $query);
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
    }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
    $email = $_POST['email'];
    $password = mysqli_real_escape_string($conn, $_POST['password']);
  
    if (empty($email)) {
      array_push($errors, "Username is required");
    }
    if (empty($password)) {
      array_push($errors, "Password is required");
    }
  
    if (count($errors) == 0) {
      $password = md5($password);
      $query = "SELECT * FROM anggota WHERE email_anggota='$email' AND password_anggota='$password'";
      $results = mysqli_query($conn, $query);
      if (mysqli_num_rows($results) == 1) {
        $_SESSION['email'] = $email;
        $_SESSION['success'] = "You are now logged in";
        header('location: index.php');
      }else {
        array_push($errors, "Wrong email/password combination");
      }
    }
}

?>