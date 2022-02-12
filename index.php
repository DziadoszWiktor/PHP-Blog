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
	<link rel="stylesheet" href="../style/index.css">
        <link rel="stylesheet" href="../style/fontello.css">
	<script src="./scripts/index.js"></script>

        <title>Projekt PP4</title>
    </head>

    <body>
	<?php
	ob_start();
	//pobieranie nr strony z id postu jak nie to null	
	$page = $_GET['action'] ?? null;
	?>
        <div id="container">    
            <div class="figurenav">
                <nav>
                    <ul>
                        <li><a href="http://v-ie.uek.krakow.pl/~s214677/PP4/Projekt/">Home</a></li>
                        <li><a href="#about">About</a></li>
                        <li><a href="http://v-ie.uek.krakow.pl/~s214677/PP4/Projekt/login.php">Admin area</a></li>
                    </ul>
                </nav>
            </div>
            <div class="figuretit">
                <div class="title">
                    <h1>"HELLO BLOG!"</h1>
                    <h5>anything related do Computing Technology</h5>
                </div>
            </div>
            <div class="figureph"> 
                <div class="contact">
                    <h1>Wiktor's</h1>
                    <h1 style="font-size: 40px;">Information Technology Blog</h1>
                    <button type="submit" class="contact-button"><a href="http://v-ie.uek.krakow.pl/~s214677/PP4/Projekt/contact.php">CONTACT ME</a></button>
                </div>
            </div>
            <div class="figureposts">
                <div class="rect1" id="rect1">
			<?php
			//wyswietlanie postow
			require_once "credentials.php";
			$condb=new PDO($db_pg,$user,$password);
			$query= "select * from posts";
			$ready=$condb->prepare("$query");
			$ready->execute();
			//tutajjjjjjjj
			$posts = array();
			foreach ($ready as $row){
				print "<a href='http://v-ie.uek.krakow.pl/~s214677/PP4/Projekt/?action=page$row[0]' class='post'><div class='postt'><i class='icon-user2'></i><h1>$row[1]</h1><br><h5>$row[4] $row[5]</h5><br><h1 class='post-title'>$row[2]</h1></div></a>";
				array_push($posts,array($row[0],$row[1],$row[2],$row[3]));
			}
			
			//zapisywanie id_postow 	
			$ids = array();
			foreach ($students as $s){
				array_push($ids,$s[0]);
			}
			?>
                </div>
                <div class="rect2">
                    <div class="box1">
			<div class="box-text">
				<h1>All last news of programming and Web development!</h1>
			</div>
                    </div>
                    <div class="box2">
  		    	<input type="text" class="search-box" id="input-bar" placeholder="  Search for posts..." onkeyup="Search()">
		    </div>
                </div>
            </div>
            <?php include "footer.php";?>
        </div>
	<?php
	//in_array($page,$ids) || !$page == null
	//jesli strona nie ma wartosci null to..
	if (isset($_GET['action'])) {
		ob_end_clean();
		//header("Refresh:0");
		$part = explode('e',$page);
		include "navbar.php";
		//print "<div class='comment-form'><form method='post' action='index.php/?action=page$part[1]'>";
		//include "comment-form.php";		
		//include "footer.php";
	
		$query2= "select * from posts where post_id="."$part[1]";
		$ready2=$condb->prepare("$query2");
		$ready2->execute();
		foreach ($ready2 as $rrr) print "
			<div class='post-icon-creator'><i class='icon-user1'></i><h2 class='post-creator'>$rrr[1]</h2></div><br>
			<h3 class='post-time'>$rrr[4] $rrr[5]</h3><br><br> 
			<h1 class='post-title'>$rrr[2]</h1><br><br> 	
			<h1 class='post-content'>$rrr[3]</h1>";

		$query3 = "select comments.comment_id,nickname,title,content,date_c,time_c,posts_comments.post_id from comments left join posts_comments using (comment_id) where posts_comments.post_id="."$part[1]";
		$ready3=$condb->prepare("$query3");
		$ready3->execute();
		foreach ($ready3 as $ro) print "
			<div class='comment'>
			<p class='comment-creatorr'>$ro[1]</p>
			<p class='comment-time'>$ro[4] $ro[5]</p>
			<p class='comment-title'>$ro[2]</p>
			<p class='comment-text'>$ro[3]</p>
			</div>";

		print "<div class='comment-form'><form method='post' action='index.php/?action=page$part[1]'>";
		include "comment-form.php";		
		include "footer.php";

		if(isset($_POST["submitt"])) {
			//header("Location:http://v-ie.uek.krakow.pl/~s214677/PP4/Projekt/index.php/?action=page$part[1]");
			$nick = $_POST['nickname'];
			$tit = $_POST['title'];
			$comm = $_POST['comment'];
			$condb=new PDO($db_pg,$user,$password);
			$numid = "select comment_id from comments";
			$nn=$condb->prepare("$numid");
			$nn->execute();
			foreach ($nn as $e) $o = intval($e[0])+1;

			$datee = date("Y-m-d");
			$timee = date("H:i");
			$commm = "insert into comments (nickname,title,content,date_c,time_c) values ('$nick','$tit','$comm','$datee','$timee')";
			$comreq = $condb->prepare("$commm");
			$comreq->execute();
		
			$postcomm = "insert into posts_comments values ('$part[1]','$o')";
			$compostreq = $condb->prepare("$postcomm");
			$compostreq->execute();
			//print "<script>location.reload();</script>";
			//header("Refresh:0");
		}
	}
	?>
    </body>

</html>
