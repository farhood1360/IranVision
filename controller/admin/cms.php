<?php
/* Name: Iran Vision/ CMS
Author: Farhood Rashidi
Date: 01/06/2015
This script gets author name, post date, web page, and web page's content will be held for posting to the template of page.
*/

include '../../model/database.php';

if(isset($_POST["submit"])){
	if(empty($_POST['author']) || !isset($_POST['page']) || empty($_POST['content']) || empty($_POST['titr'])){
		$message = "<p style='color: red; text-align: center'>You must enter your name, web page, message header, and the message body. <br> Click the submit button agian.</p>";
	}else{
		$author = ucfirst(addslashes($_POST['author']));
		$titr = ucfirst(addslashes($_POST['titr']));
		$page= addslashes($_POST['page']);
		$content = ucfirst(addslashes($_POST['content']));
	}
}

if(isset($_POST["back"])){
	header('Location: ../../model/login.php');
}

if(isset($_POST["reset"])){
	$message = "";
}

$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
$newDatabae->insert_content($author, $page, $titr, $content);
$newDatabae->disconnect();
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
	<title>Iran Vision :: CMS</title>
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
			<h2>Content Management System</h2>
			<article>
				<p style='text-align: center'>
					Please fill out the cms form below:
			    </p>
				
				<!-- Begin Form -->
				<form name="cmsForm" id="cmsForm" class="form" method="post" action="cms.php">
					<p>
						<label for="author"><span>*</span>Author</label> 
						<input name="author" type="text" size="58" maxlength="60" autofocus /> 
					</p>
	                <p>
	               		<label for="page"><span>*</span>Category</label>
	                    <select name="page">
	                    	<option>Select One</option>
	                   		<option name="culture">Culture Of Iran</option>
	                    	<option name="iran">History Of Iran</option>
	                        <option name="tradition">Tradition Of Zoroastrian</option>
	                        <option name="zoro">Zoroastrianism</option>
	                        <option name="history">History Of Zoroastrian</option>
	                    </select>
	                </p>
	                <p>
						<label for="titr"><span>*</span>Title</label> 
						<input name="titr" type="text" size="60" maxlength="70"/> 
					</p>
					<p>
					  	<label for="content"><span>*</span>Please write the content of web page:</label>
	                    <textarea name="content" cols="60" rows="6"></textarea>
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
