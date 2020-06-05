<?php
session_start();
include("source/soure.php");
$p=new database();
if(isset($_GET['ac']) && $_GET['ac']=='logout')
	{
		unset($_SESSION['mylogin']);
		header('location:index.php');
	}
if(isset($_REQUEST['nut']))
{
	$nut=$_REQUEST['nut'];	
}
else
{
	$nut='';	
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="CSS/cssadmin.css"/>
<title>Hiển Thị Sản Phẩm</title>
</head>
<body>
<div class="wrapper">
	<div class="header">
    	<img src="images/banner.jpg" width="100%" height="120px" />
    </div>
    <div class="menu">
    	<ul>
        	<li><a href="../PHP - Tuấn/index.html">Trang Chủ</a></li>
            <li><a href="#">Sản Phẩm</a></li>
			<li><a href="#">Hướng Dẫn</a></li>
            <li><a href="index.php?ac=logout">Đăng xuất</a></li>
        </ul>
    </div>
    <div class="content">
    	<div class="left">
        	<p style="text-align:center;color:red;background:#03F;padding:10px">Hiệu Sản Phẩm </p>
            <div class="danhsachsanpham">
            	<ul>
                	<?php
					
					$p->loadnhasanxuat("select * from nhasx");
					?>
                    
                </ul>
            </div>
         </div>
        <p>&nbsp;</p>
        <div class="right">
       	  <p style="text-align:center;color:red;background:#0CF;padding:px">Tất Cả Sản Phẩm </p>
            <div class="sanphamall">
            	<ul>
                	<?php
					if(isset($_REQUEST['hang']))
					{
						$idhang=$_REQUEST['hang'];
						$p->loadsanpham("select * from sanpham where idnhasx='$idhang'");
					}
					else
					{
							$p->loadsanpham("select * from sanpham");
					}
					?>
                </ul>
             </div>
        </div>
     </div>
     <div class="clear"></div>
    <footer class="parallax-section">
	<div class="container">
	  <div class="row">
		<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<?php
					if(isset($_REQUEST['idxoa']))
					{
						$idxoa=$_REQUEST['idxoa'];
						$sql="delete from sanpham where id='$idxoa'";
						$thongbao=$p->themxoasua($sql);
						if($thongbao==1)
						{
							unlink("images/".$idxoa.".jpg");
							echo ' <script language="javascript">window.location="admin.php"</script>';	
						}
						else
						{
							echo ' <script language="javascript">alert("Xóa không thành công")</script>';	
						}
					}
				?>
		</div>
	</div>
</footer>
<form method="post" enctype="multipart/form-data">
<table width="600" border="1" align="center">
  <tr>
    <td width="189">Tên sản phẩm</td>
    <td width="395"><input name="txttensanpham" type="text" /></td>
  </tr>
  <tr>
    <td>Giá</td>
    <td><input name="txtgia" type="text" /></td>
  </tr>
  <tr>
    <td>Mô tả</td>
    <td><input name="txtmota" type="text" /></td>
  </tr>
  <tr>
    <td>Nhà sản xuất</td>
    <td><select name="nhasanxuat">
      <?php $p->select(); ?>
    </select></td>
  </tr>
  <tr>
  <td >Hình sản phẩm</td>
  <td><input name="myfile" type="file" /></td>
  </tr>
  <tr>
  <td colspan="2" align="center"><input name="nut" type="submit" value="Thêm sản phẩm" /></td>
  </tr>
</table>
<?php
switch($nut)
{
	case'Thêm sản phẩm':
	{
		$ten=$_REQUEST['txttensanpham'];
		$gia=$_REQUEST['txtgia'];
		$mota=$_REQUEST['txtmota'];
		$idnhasanxuat=$_REQUEST['nhasanxuat'];
		$tmp_name=$_FILES['myfile']['tmp_name'];
		$sql="insert into sanpham(tensanpham,gia,mota,idnhasx) values('$ten','$gia','$mota','$idnhasanxuat')";
		$thongbao=$p->themxoasua($sql);
		if($thongbao==1)
		{
			$idnew=mysql_insert_id();
			echo $idnew;
			if($p->upfile($tmp_name,$idnew)==1)
			{
				echo '<script language="javascript">alert("Thêm sản phẩm thành công");</script>';
				echo '<script language="javascript">window.location="admin.php"</script>';
			}
		}
		else
		{
			echo '<script language="javascript">alert("Thêm sản phẩm không thành công");</script>';
		}
		break;
	}
}
?>
</form>
<!-- copyright section -->
<section id="copyright">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h3>BE2T SHOES </h3>
				<p>MANG LẠI CHO BẠN NHỮNG BƯỚC ĐI THOẢI MÁI</p> 
			</div>
		</div>
	</div>
</section>

</div>
</body>
</html>