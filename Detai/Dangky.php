<?php
include('source/soure.php');
$p= new database();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="CSS/login.css">
  <title>Dang ky</title>
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

    <form name="frm" onsubmit=" return dangky() " method="post" class="form-signin">
    <h3><a href="index.php">BE2T SHOES</a></h3>
  <input name="txtusername" type="text" autofocus required class="form-control" placeholder="User">
  <input name="txtpass" type="password" required class="form-control" id="inputPassword" placeholder="Password">
  <input name="txthodem" type="text" autofocus required class="form-control" placeholder="Họ đệm">
  <input name="txtten" type="text" autofocus required class="form-control" placeholder="Tên">
  <input name="txtdiachi" type="text" autofocus required class="form-control" placeholder="Địa chỉ">
  <input name="txtsdt" type="text" autofocus required class="form-control" placeholder="SĐT">
  <button name="nut" class="btn btn-lg btn-primary btn-block" type="submit">Đăng ký</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2018-2019</p>
  
  <?php
  if(isset($_REQUEST['nut']))
  {
      $user=$_REQUEST['txtusername'];
        $pass=md5($_REQUEST['txtpass']);
		$hodem=$_REQUEST['txthodem'];
		$ten=$_REQUEST['txtten'];
		$diachi=$_REQUEST['txtdiachi'];
		$sdt=$_REQUEST['txtsdt'];
		$sql="insert into khachhang(username,password,hodem,ten,diachi,sdt) values('$user','$pass','$hodem','$ten','$diachi','$sdt')";
    	$thongbao=$p->themxoasua($sql);
		if($thongbao==1)
		{
			echo'<script language="javascript">alert("Đã đăng ký thành công");</script>
';
		}
		else
		{
			echo'<script language="javascript">alert("Đã đăng ký thành công");</script>
';
		}
  }
  ?>
  <script language="javascript">
  function dangky()
  {
	if(frm.txtusername.value=="")
	{
		alert("Chưa nhập tên đăng nhập");
		frm.txtusername.focus();
		return false;
	}
		if(frm.txtpass.value=="")
	{
		alert("Chưa nhập mật khẩu");
		frm.txtpass.focus();
		return false;
	}
		if(frm.txtuhodem.value=="")
	{
		alert("Chưa nhập họ đệm");
		frm.txtuhodem.focus();
		return false;
	}
		if(frm.txtten.value=="")
	{
		alert("Chưa nhập tên");
		frm.txtten.focus();
		return false;
	}
		if(frm.txtdiachi.value=="")
	{
		alert("Chưa nhập địa chỉ");
		frm.txtdiachi.focus();
		return false;
	}
		if(frm.txtsdt.value=="")
	{
		alert("Chưa nhập số điện thoại");
		frm.txtsdt.focus();
		return false;
	}
  }
  </script>
</form>
</body>

</html>