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
	<link rel="stylesheet" href="./style/posteditor.css">

        <title>Post</title>
    </head>

    <body>	
	<?php include "navbar.php";?>
	<h1 class="header-title">Post creation in progress...</h1>
	<div id="container">
		<div class="post-box">
			<form method="post" action="posteditor.php">
				<input type="text" name="nick" placeholder="author" class="input-field">
				<input type="text" name="title" placeholder="title" class="input-field"><br>
				<textarea name="post" placeholder="write your post content here..." class="text-area"></textarea><br>
				<input type="submit" name="sub" value="post" class="post-butt"><br>
			</form>
		</div>
	</div>
	<?php
	if (isset($_POST['sub'])) {
		require_once "credentials.php";
		$author = $_POST["nick"]; 
		$tit = $_POST["title"];
		$content = strval($_POST["post"]);
		//print "<script> alert(''); </script>";
		
		$con=new PDO($db_pg,$user,$password);
		$datee = date("Y-m-d");
		$timee = date("H:i");
		$s= "insert into posts (nickname,title,content,date_p,time_p) values ('$author','$tit','$content','$datee','$timee')";
		$r=$con->prepare("$s");
		$r->execute();
		//header("Refresh:0");
	}
	?>
	<?php include "footer.php";?>
    </body>
</html>