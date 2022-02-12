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
	<link rel="stylesheet" href="./style/adminarea.css">

        <title>Admin area</title>
    </head>

    <body>	
	<?php include "navbar.php";?>
	<div id="container">
		<a href="http://v-ie.uek.krakow.pl/~s214677/PP4/Projekt/posteditor.php" class="post-button"><div>
			<i class="icon-post"></i>
			<h1 class="post-text">Write a post</h1>
		</div></a>
		<a href="http://v-ie.uek.krakow.pl/~s214677/PP4/Projekt/seecontacts.php" class="contactt-button"><div>
			<i class="icon-cloud"></i>
			<h1 class="cloud-text">See all contacts</h1>
		</div></a>
	</div>
	<?php?>
	<?php include "footer.php";?>
    </body>
</html>