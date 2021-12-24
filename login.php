<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>login</title>
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
  <?php 
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
  include('inc/conn.php');
  $username = $_POST['name'];
  $password = $_POST['pass'];
    $sql="SELECT * FROM user WHERE username ='{$username}' and password='{$password}'";
    $rs= mysqli_query($conn, $sql);
  $user = mysqli_fetch_assoc($rs);
  if($user){
     if ($user['role'] == 1) {

        header('location:admin/index.php');
       
     }else{
      session_start();
      $_SESSION['username'] = $username;
     header('Location:index.php');
      
     }
            }
  else{
    ?>
        <div class="alert alert-info" role="alert">
      <p class="text-center">Incorrect password or username</p>
      </div>
    <?php 
     }
   }
    ?>
<div class="login-form">
    <form method="POST" class="form-login">
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="text" class="form-control" placeholder="Username" name="name" required="required">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" name="pass" required="required">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <a href="register.php" class="float-right">Create an Account</a>
        </div>        
        <?php include('inc/footer.php'); ?>
</div>
</body>
</html>