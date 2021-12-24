<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Register</title>
 <?php include('inc/opening.php'); ?>
<style>
.login-form {
    width: 340px;
    margin: 50px auto;
    font-size: 15px;
}
.login-form form {
    margin-bottom: 15px;
    background: #f7f7f7;
    box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
    padding: 30px;
}
.login-form h2 {
    margin: 0 0 15px;
}
.form-control, .btn {
    min-height: 38px;
    border-radius: 2px;
}
.btn {        
    font-size: 15px;
    font-weight: bold;
}
</style>
</head>
<body>
  <?php session_start();
  $_SESSION['user'] =0;
 if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
  include('inc/conn.php');
  $login="false";
  $username = $_POST['name'];
  $password = $_POST['pass'];
  $repass = $_POST['repass'];
    $sql="SELECT * FROM user WHERE username ='{$username}'";
    $rs= mysqli_query($conn, $sql);
  $user = mysqli_fetch_assoc($rs);
  
  if (strcmp($username, $user['username']) == 0){ 
    ?>

     <div class="alert alert-warning" role="alert">
      <p class="text-center">Username exist please enter agian</p>
      </div>
      <?php
  }
  else {
    if(strcmp($password, $repass) == 0){
      $query = mysqli_query($conn, "INSERT INTO user(username,password) VALUES ('$username','$password')");
      ?>
      <div class="alert alert-success" role="alert">
      <p class="text-center">Register success!</p>
      </div>

      <?php 
    }
    else{?>
      <div class="alert alert-success" role="alert">
      <p class="text-center">Password and re-enter password are not same!</p>
      </div>
      <?php
    }
  }
}
?>
<div class="login-form">
    <form method="POST" class="form-login">
        <h2 class="text-center">Register</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="name" required="required" >
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="pass"  required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="re-enter password" name="repass"  required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </div>
        <div class="clearfix">
            <a href="Login.php" class="float-right">Login here!</a>
        </div>        
        <?php include('inc/footer.php'); ?>
</div>
</body>
</html>