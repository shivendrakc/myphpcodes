<?php
    include('db.php');
    
    if (isset($_POST['submit'])){
        if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password'])){
            $name = mysqli_escape_string($conn, $_POST['name']);
            $email = mysqli_escape_string($conn, $_POST['email']);
            $password = mysqli_escape_string($conn, $_POST['password']);

            $sql = "INSERT INTO users(name, email, password) VALUES ('$name', '$email', '$password')";
            
            $res = mysqli_query($conn, $sql);
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Index.css">
    <title>Form</title>
</head>
<body>
  <div class="login-box">
    <h2>Sign Up</h2>
      <form method="POST">
        <div class="user-box">
          <input type="text" name="name" required>
          <label>Username</label>
        </div>
        <div class="user-box">
          <input type="text" name="email" required>
          <label>Email</label>
        </div>
        <div class="user-box">
          <input type="password" name="password" required>
          <label>Password</label>
        </div>
        <a href="#">
          <span></span>
          <span></span>
          <span></span>
          <span></span>
          <input type="submit" name="submit" value="submit">
        </a>
      </form>
  </div>
</body>
</html>