<?php
include("../Assets/Connection/Connection.php");
session_start();
//include("Head.php");
if(isset($_POST["btnlogin"]))
{
	$selUser="select * from tbl_user where user_email='".$_POST["txt_username"]."' and user_password='".$_POST["txt_password"]."'";
	$result_1=$conn->query($selUser);
	
	$selAdmin="select * from tbl_admin where admin_email='".$_POST["txt_username"]."' and admin_password='".$_POST["txt_password"]."'";
	$result_2=$conn->query($selAdmin);
	$selWorkshop="select * from tbl_workshop where workshop_email='".$_POST["txt_username"]."' and workshop_password='".$_POST["txt_password"]."' and workshop_status='1'";
	$result_3=$conn->query($selWorkshop);
	$selMechanic="select * from tbl_mechanic where mechanic_email='".$_POST["txt_username"]."' and mechanic_password='".$_POST["txt_password"]."'";
	$result_4=$conn->query($selMechanic);
	$selShop="select * from tbl_shop where shop_email='".$_POST["txt_username"]."' and shop_password='".$_POST["txt_password"]."'";
	$result_5=$conn->query($selShop);
	
	if($dataUser=$result_1->fetch_assoc())
	{
		$_SESSION["uid"]=$dataUser["user_id"];
		$_SESSION["uname"]=$dataUser["user_name"];
		header("Location:../User/HomePage.php");
	}
	
	else if($dataAdmin=$result_2->fetch_assoc())
	{
		$_SESSION["aid"]=$dataAdmin["admin_id"];
		$_SESSION["aname"]=$dataAdmin["admin_name"];
		header("Location:../Admin/HomePage.php");
	}
	else if($dataWorkshop=$result_3->fetch_assoc())
	{
		$_SESSION["wid"]=$dataWorkshop["workshop_id"];
		$_SESSION["wname"]=$dataWorkshop["workshop_name"];
		header("Location:../Workshop/HomePage.php");
	}
	else if($dataMechanic=$result_4->fetch_assoc())
	{
		$_SESSION["mid"]=$dataMechanic["mechanic_id"];
		$_SESSION["mname"]=$dataMechanic["mechanic_name"];
		header("Location:../Mechanic/HomePage.php");
	}
	else if($dataShop=$result_5->fetch_assoc())
	{
		$_SESSION["sid"]=$dataShop["shop_id"];
		$_SESSION["sname"]=$dataShop["shop_name"]; 
		header("Location:../Shop/HomePage.php");
	}
	else
	{
		?>
        <script>
		alert("Inavlid Details");
		</script>
        <?php
	}
	
}


?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="../Assets/Templates/Login/css/style.css">

	</head>
	<body class="img js-fullheight" style="background-image: url(../Assets/Templates/Login/images/Snapseed-Background-92.jpg);">
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<!--<div class="col-md-6 text-center mb-5">
<h2 class="heading-section">Hike</h2>
				</div>-->
			</div>
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-4">
<div class="login-wrap p-0">
		      	<h3 class="mb-4 text-center">Have an account?</h3>
		      	<form action="#" class="signin-form" method="post">
		      		<div class="form-group">
		      			<input type="text" class="form-control" name="txt_username" placeholder="Username" required autocomplete="off">
		      		</div>
	            <div class="form-group">
	              <input id="password-field" type="password" class="form-control" name="txt_password" placeholder="Password" required autocomplete="off">
	              <span toggle="#password-field" class="fa fa-fw fa-eye field-icon toggle-password"></span>
	            </div>
	            <div class="form-group">
	            	<button type="submit" name="btnlogin" class="form-control btn btn-primary submit px-3">Sign In</button>
	            </div>
	            <div class="form-group d-md-flex">
			<div class="w-50">
		            	<label class="checkbox-wrap checkbox-primary">
				 
				  <span class="checkmark"></span>
				</label>
			</div>
			<div class="w-50 text-md-right">
				<a href="../" style="color: #fff">Back to Home</a>
			</div>
	            </div>
	          </form>
	         
	          </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="../Assets/Templates/Login/js/jquery.min.js"></script>
  <script src="../Assets/Templates/Login/js/popper.js"></script>
  <script src="../Assets/Templates/Login/js/bootstrap.min.js"></script>
  <script src="../Assets/Templates/Login/js/main.js"></script>

	</body>
</html>

