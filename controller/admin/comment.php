<?php
/* Name: Iran Vision/ Comment
Author: Farhood Rashidi
Date: 01/06/2015
This script gets author name, web page, and comment will be held for posting.
*/

include '../../model/database.php';

session_start();
if(isset($_POST["submit"])){
	if(empty($_POST['author']) || empty($_POST['comment'])){
		$message = "<p style='color: red; text-align: center'>You must enter your name and comment. <br> Click the submit button agian.</p>";
	}else{
		$author = ucfirst($_POST['author']);
		$comment = ucfirst($_POST['comment']);
		$page = $_SESSION['page'];

		if($page === 'Zoroastrianism'){
			header('LOCATION: ../../view/zoroastrian.php');
		}elseif($page === 'Culture Of Iran'){
			header('LOCATION: ../../view/culture.php');
		}elseif($page === 'History Of Zoroastrian'){
			header('LOCATION: ../../view/historyofzoroastrian.php');
		}elseif($page === 'Tradition Of Zoroastrian'){
			header('LOCATION: ../../view/tradition.php');
		}elseif($page === 'History Of Iran'){
			header('LOCATION: ../../view/history.php');
		}else{
			header('LOCATION: ../../view/aboutus.php');
		}
	}
}

if(isset($_POST["back"])){
			header('LOCATION: ../../index.php');
}

if(isset($_POST["reset"])){
	$message = "";
}

$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
$newDatabae->insert_comment($author, $page, $comment);
$newDatabae->disconnect();
session_destroy();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!-- 
Programmer: Farhood Rashidi
Date: 05/16/2013
Name: Iran Vision
-->

<!-- header start hear -->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="description" content=" This web site promotes the Pasargad Company including Iran vision (history and culture) and Zoroastrian vision (tradition, region and history)."/>
	<meta name="keywords" content=" zoroaster, persian, history of iran, iran, zoroastrianism, culture of iran, history of zoroastrain, tradition of zoroastrain, farsi"/>
	<title>Iran Vision :: Comment</title>
	<link  href="../../css/zna.css" rel="stylesheet" type="text/css" />
</head>

<!-- body start hear -->
<body>
	<h1>Iran Vision</h1>

	<!-- navigation start hear -->
    <nav>
      <ul>
				<li><a href="../../index.php">Home</a></li>
				<li><a href="../../aboutus.php">About Us</a></li>
				<li><a href="../../controller/survay.php">Survey</a></li>
				<li><a href="../../view/culture.php">Culture Of Iran</a></li>
				<li><a href="../../view/history.php">History Of Iran</a></li>
				<li><a href="../../view/tradition.php">Tradition Of Zoroastrian</a></li>
				<li><a href="../../view/zoroastrian.php">Zoroastrianism</a></li>
				<li><a href="../../view/historyofzoroastrian.php">History Of Zoroastrian</a></li>
				<li><a href="../../controller/contactus.php">Sign Up</a></li>
				<li><a href="../../model/login.php">Sign In</a></li>
			</ul>
    </nav>	

		<aside>			
			<!-- content start hear -->
			<h2>Comment Form</h2>
			<article>
				<p style='text-align: center'>
					Please fill out the comment form below:
			  </p>
				
				<!-- Begin Form -->
				<form name="commentForm" id="commentForm" class="form" method="post" action="comment.php">
					<p>
						<label for="author"><span>*</span>Author</label> 
						<input name="author" type="text" size="58" maxlength="60" autofocus /> 
					</p>
					<p>
					  	<label for="comment"><span>*</span>Please write tyour comment:</label>
	                    <textarea name="comment" cols="60" rows="6"></textarea>
					</p>
					<p>
						<input name="submit" type="submit" id="mySubmit" class="button" value="Submit" />
						<input name="reset" type="reset" value="Reset" class="button" />
	        </p>
	        
	        <span>*<strong> :Required</strong></span>
	        <?=$message; ?>
	        <input name="back" type="submit" id="mySubmit" class="button" value="<< Back" />
				</form>
			</article>            
		
			<!-- footer start hear -->
			<footer>
				Copyright &copy;<?=date('Y') ?> Farhood Rashidi. All rights reserved.<br/>
				<a href="mailto:farhud.rashidi@gmail.com">farhud.rashidi@gmail.com</a>
			</footer>
		</aside>    
	</body>
</html>
