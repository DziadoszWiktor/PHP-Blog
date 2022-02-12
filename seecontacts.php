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
	<link rel="stylesheet" href="./style/seecontacts.css">

        <title>All contacts</title>
    </head>

    <body>	
	<?php include "navbar.php";?>
	<div id="container">
		<?php
			require_once "credentials.php";
	
			$con=new PDO($db_pg,$user,$password);
			$s= "select * from contacts";
			$r=$con->prepare("$s");
			$r->execute();
			//header("Refresh:0");
		
			foreach ($r as $row) {
				print "
					<div class='message'>
						<h1 class='message-text'>Nickname: $row[1]<br></h1>
						<h1 class='message-text'>E-mail: $row[2]<br></h1>
						<h1 class='message-text'>Message: $row[3]<br></h1>
					</div>";
			}	

		?>
	</div>
	<?php include "footer.php";?>
    </body>
</html>