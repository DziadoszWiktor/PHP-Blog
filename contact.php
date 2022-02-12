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
	<link rel="stylesheet" href="./style/contact.css">
	<script src="./scripts/contact.js"></script>

        <title>Contact us</title>
    </head>

    <body>	
	<?php include "navbar.php";?>
	<div id="container">
		<div class="contact-box">
			<div class="contact-box1">
				<i class="icon-mail" id="icon-mail"></i><br>
				<h1 class="contact-text">Get in touch</h1>
			</div>
			<div class="contact-box2">
				<form method="post" action="contact.php" name="contacts">
					<input type='text' name='fullname' placeholder="full name" class="text-box">
					<input type='text' name='email' placeholder="e-mail" id="e" class="text-box" onkeypress="Check()">
					<input type='text' name='mess' placeholder="message" class="text-box">
					<input type="submit" value="contact me" name="contact" class="contact-buttonn">
				<form/>
			</div>
		</div>
	</div>
	<?php
	include "credentials.php";
	
	if (isset($_POST['contact'])){
		$fulln = $_POST['fullname'];
		$mail = $_POST['email'];
		$mess = $_POST['mess'];
		
		$con=new PDO($db_pg,$user,$password);		
		$s= "insert into contacts (full_name,email,content) values ('$fulln','$mail','$mess')";
		$r=$con->prepare("$s");
		$r->execute();
	}
	?>
	<?php include "footer.php";?>
    </body>
</html>
