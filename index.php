<?php
/* Name: Iran Vision / Home
   Author: Farhood Rashidi
   Date: 01/06/2015
   This script gets the web page name and then displays the category of web page or error message. 
*/
$WebPage = "";
$message = "&#160;";
if(isset($_POST["submit"])){
	if(empty($_POST['search']) ){
		$message = "<p style='color: red; text-align: center'>You must enter your category.<br/> Click the submit button for search agian.</p>";
	}else{
		$WebPage = strtolower($_POST['search']);
		if($WebPage === 'zoroastrianism'){
			header('LOCATION: view/zoroastrian.php');
		}elseif($WebPage === 'culture'){
			header('LOCATION: view/culture.php');
		}elseif($WebPage === 'history'){
			header('LOCATION: view/historyofzoroastrian.php');
		}elseif($WebPage === 'tradition'){
			header('LOCATION: view/tradition.php');
		}elseif($WebPage === 'iran'){
			header('LOCATION: view/history.php');
		}else{
			$message = "<p style='color: red'>We don't have this category! Try again.</p>" ;
		}
		mysql_close($link);
	}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!-- 
    	Programmer: Farhood Rashidi
        Date: 05/16/2012
        Name: Iran Vision
    -->
     
    <!-- header start hear -->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content=" This web site promotes the Pasargad Company including Iran vision (history and culture) and Zoroastrian vision (tradition, region and history)."/>
        <meta name="keywords" content=" zoroaster, persian, history of iran, iran, zoroastrianism, culture of iran, history of zoroastrain, tradition of zoroastrain, farsi"/>
		<title>Iran Vision :: Home</title>
   		<link  href="css/zna.css" rel="stylesheet" type="text/css" />
	</head>
    
	<!-- body start hear -->
	<body >
	  		<h1>Iran Vision</h1>
			<!-- navigation start hear -->
			<nav>
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="aboutus.php">About Us</a></li>
					<li><a href='controller/survay.php'>Survey</a></li>
					<li><a href="view/culture.php">Culture Of Iran</a></li>
					<li><a href="view/history.php">History Of Iran</a></li>
					<li><a href="view/tradition.php">Tradition Of Zoroastrian</a></li>
					<li><a href="view/zoroastrian.php">Zoroastrianism</a></li>
					<li><a href="view/historyofzoroastrian.php">History Of Zoroastrian</a></li>
					<li><a href="controller/contactus.php">Sign Up</a></li>
					<li><a href="model/login.php">Sign In</a></li>
				</ul>
			</nav>
			
			<aside>
				<!-- content start hear -->
				<article>
					<h2>Welcome!</h2>
					<img src="image/takhte_jamshid10.jpg" alt="perpolis" height="210" width="537"
						onmouseover="this.src='image/takhtjam.jpg'"
						onmouseout="this.src='image/takhte_jamshid10.jpg'"/>
					<ul>
						<li onmouseover="this.style.color='blue';
							this.style.fontWeight='bold'"
							onmouseout="this.style.color='black';
							this.style.fontWeight='normal'">Culture Of Iran
						</li>
						<li onmouseover="this.style.color='blue';
							this.style.fontWeight='bold'"
							onmouseout="this.style.color='black';
							this.style.fontWeight='normal'">History Of Iran
						</li>
						<li onmouseover="this.style.color='blue';
							this.style.fontWeight='bold'"
							onmouseout="this.style.color='black';
							this.style.fontWeight='normal'">Zoroastrianism
						</li>
						<li onmouseover="this.style.color='blue';
							this.style.fontWeight='bold'"
							onmouseout="this.style.color='black';
							this.style.fontWeight='normal'">Tradition Of Zoroastrian
						</li>
						<li onmouseover="this.style.color='blue';
							this.style.fontWeight='bold'"
							onmouseout="this.style.color='black';
							this.style.fontWeight='normal'">History Of Zoroastrian
						</li>
						<li onmouseover="this.style.color='blue';
							this.style.fontWeight='bold'"
							onmouseout="this.style.color='black';
							this.style.fontWeight='normal'">Avesta
						</li>
						<li onmouseover="this.style.color='blue';
							this.style.fontWeight='bold'"
							onmouseout="this.style.color='black';
							this.style.fontWeight='normal'">Pahlavi Books
						</li>
						<li onmouseover="this.style.color='blue';
							this.style.fontWeight='bold'"
							onmouseout="this.style.color='black';
							this.style.fontWeight='normal'">Middle Persian Books
						</li>
						<li onmouseover="this.style.color='blue';
							this.style.fontWeight='bold'"
							onmouseout="this.style.color='black';
							this.style.fontWeight='normal'">Ancient Persian Books
						</li>
						<li onmouseover="this.style.color='blue';
							this.style.fontWeight='bold'"
							onmouseout="this.style.color='black';
							this.style.fontWeight='normal'">Zoroastrian Famous
						</li>
						<li onmouseover="this.style.color='blue';
							this.style.fontWeight='bold'"
							onmouseout="this.style.color='black';
							this.style.fontWeight='normal'">Iranian Famous
						</li>
					</ul>
                    <br/>

                    <!-- Begin Form -->
					<form name="searchForm" id="searchForm" class="form" method="post" action="index.php" >
						<p>
							<label for="search"><strong>Webpage Category:</strong></label> 
							<input name="search" id="search" type="text" size="40" maxlength="50" autofocus />
                        </p>
						<p>
							<input name="submit" type="submit" id="mySubmit" class="button" value="Submit" />
							<input name="reset" type="reset" value="Reset" class="button" />
                      </p>
                      <?=$message; ?>
                  	</form>
                </article>

				<!-- footer start hear -->
				<footer>
					Copyright &copy;<?=date('Y'); ?> Farhood Rashidi. All rights reserved.<br/>
					<a href="mailto:farhud.rashidi@gmail.com">farhud.rashidi@gmail.com</a>
				</footer>
		</aside>
	</body>
</html>
