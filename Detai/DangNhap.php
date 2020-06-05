<?php
	include('source/soure.php');
	$p=new database();
?>
<!DOCTYPE html>
<html>

<head>

  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="CSS/login.css">
  <title>Login</title>
<script src="JS/bootstrap.min.js"></script>
<script src="JS/jquery.min.js"></script>
   <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
  

</head>



       <body class="text-center">

    <form method="post" class="form-signin">
    <h3><a href="index.php">BE2T SHOES</a></h3>
  <input name="txtusername" type="text" autofocus required class="form-control" placeholder="User">
  <input name="txtpass" type="password" required class="form-control" id="inputPassword" placeholder="Password">
  <button name="nut" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <a href="Dangky.php">Đăng ký</a>
  <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
  
  <?php
  if(isset($_REQUEST['nut']))
  {
      $user=$_REQUEST['txtusername'];
        $pass=$_REQUEST['txtpass'];
    $p->mylogin($user,$pass);
  }
  ?>
</form>
</body>

</html>