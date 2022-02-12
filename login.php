<!DOCTYPE html>
<html>

    <head>
        <meta name="keywords" content="Projekt,PP4,HTML,CSS,JavaScript,PHP"/>
        <meta name="author" content="Wiktor Dziadosz (s214677)"/>
        <meta charset="UTF-8"/>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" href="./img/ico.ico" type="image/gif" sizes="64x64">
        <link rel="stylesheet" href="./style/index.css">
        <link rel="stylesheet" href="./style/fontello.css">
	<link rel="stylesheet" href="./style/login.css">

        <title>Login</title>
    </head>

    <body>	
	<?php include "navbar.php";?>
	<div id="container">
		<div class="login-box">
			<div class="login-box1">
				<i class="icon-user2" id="icon-user1"></i><br>
				<h1 class="login-text">Admin area</h1>
			</div>
			<div class="login-box2">
				<form method="post" action="login.php">
					<input type='text' name='username' placeholder="nickname" class="text-box">
					<input type='password' name='password' placeholder="password" class="text-box">
					<input type="submit" value="login" name="sub" class="login-buttonn">
				<form/>
			</div>
		</div>
	</div>
	<?php
	include "credentials.php";
	if(isset($_POST['sub'])){
		include "credentials.php";
		
		$nick = $_POST['username'];
		$pswd = $_POST['password'];

		$con=new PDO($db_pg,$user,$password);
		$s= "select * from admin";
		$r=$con->prepare("$s");
		$r->execute();
	
		$login = array();
		foreach ($r as $row) {
			array_push($login,$row[0],$row[1],$row[2]);
		}
	
		$loginn="$login[1]";
		$pswdd="$login[2]";
	
		if ( $nick == $loginn && $pswd == $pswdd ) {	
			header('Location: '.'http://v-ie.uek.krakow.pl/~s214677/PP4/Projekt/adminsection.php');
		}else{
			print "<script>alert('Access denied');</script>";
		}	
	}
	?>
	<?php include "footer.php";?>
    </body>
</html>
