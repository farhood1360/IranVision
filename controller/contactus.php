<?php
/* Name: Iran Vision / Sign Up
   Author: Farhood Rashidi
   Date: 01/06/2015
   This script gets the member's first name, last name, e-mail address, phone number, username and password and then displays the confirmation message or error message. 
*/

include 'database.php';

if(isset($_POST["submit"])){
	if(empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['username']) ||  empty($_POST['password']) ){
		$message = "<p style='color: red; text-align: center'>You must enter your first name, last name, email, phone number, user name, and password. <br> Click the submit button for registration agian.</p>";
	}else{
		if (preg_match("/^[a-z0-9\._-]+@+[a-z0-9\._-]+\.+[a-z]{2,3}$/i", $_POST['email']) != 1)
		{
			$message = "<p style='color: red'>The email field was invalid. <br> Click the submit button for registration agian.</p>";
		}else{
			if (preg_match("/^\(([2-9][0-9]{2})\)[2-9][0-9]{2}-[0-9]{4}$/i", $_POST['phone']) != 1){
				$message = "<p style='color: red'>The phone field was invalid. <br> Click the submit button for registration agian.</p>";
			}else{
				if (preg_match("/^[0-9][a-zA-Z]{5}$/i", $_POST['password']) != 1){
					$message = "<p style='color: red'>The password must have 6 words and must be combination of letters and one number. <br> Click the submit button for registration agian.</p>";
				}else{
					if($_POST['password'] == $_POST['password_confirm']){
						$fname = addslashes($_POST['fname']);
						$lname = addslashes($_POST['lname']);
						$email = addslashes($_POST['email']);
						$phone = addslashes($_POST['phone']);
						$uname = addslashes($_POST['username']);
						$password = md5($_POST['password']);
					}else{
						$message = "<p style='color: red'>Password and Confirm Password are not same. <br> Click the submit button for registration agian.</p>";
					}
				}
			}
		} 
	}
}

if(isset($_POST["reset"])){
	$message = "";
}

if(isset($_COOKIE["LastVisit"])){
	$message .= "Welcome back! Your last visit was " . $_COOKIE['LastVisit'] ;
}else{
	$message .= "Welcome!";
}
date_default_timezone_set('CST6CDT');
setcookie("LastVisit", date("m/d/Y h:i:s a"), time() + (60 * 60 * 24 * 365));

$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
$newDatabae->insert_member($lname, $fname, $email, $phone, $uname, $password);
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
		<title>Iran Vision :: Registration</title>
   		<link  href="../css/zna.css" rel="stylesheet" type="text/css" />
	</head>
    
	<!-- body start hear --> 
	<body>
		<h1>Iran Vision</h1>
		<!-- navigation start hear -->
  		<nav>
      		<ul>
				<li><a href="../index.php">Home</a></li>
				<li><a href="../aboutus.php">About Us</a></li>
				<li><a href='../controller/survay.php'>Survey</a></li>
				<li><a href="../view/culture.php">Culture Of Iran</a></li>
				<li><a href="../view/history.php">History Of Iran</a></li>
				<li><a href="../view/tradition.php">Tradition Of Zoroastrian</a></li>
				<li><a href="../view/zoroastrian.php">Zoroastrianism</a></li>
				<li><a href="../view/historyofzoroastrian.php">History Of Zoroastrian</a></li>
				<li><a href="../model/contactus.php">Sign Up</a></li>
				<li><a href="../model/login.php">Sign In</a></li>
			</ul>
      	</nav>
		
		<aside>
			<!-- content start hear -->
			<article>
				<h2>Registration</h2>
				<p style='text-align: center'>
					Please enter information below for registration.
				</p>
				
				<!-- Begin Form -->
				<form name="registerForm" id="registerForm" method="post" action="contactus.php" >
					<p>
						<label for="fname"><span>*</span>First Name: </label> 
						<input name="fname" id="fname" type="text" size="60" maxlength="50" autofocus class="required"/>
					</p>
					<p>
						<label for="lname"><span>*</span>Last Name: </label> 
						<input name="lname" id="lname" type="text" size="60" maxlength="50" class="required"/>
					</p>
					<p>
						<label for="email"><span>*</span>E-mail Address: </label>
						<input name="email" type="text" id="email" size="53" maxlength="60" class="required" />
					</p>
					<p>
						<label for="phone"><span>*</span>Phone: </label>
						<input name="phone" id="phone" type="text" size="65" maxlength="14" class="required"/>
					</p>
					<p>
						<label for="username"><span>*</span>Username: </label> 
						<input type="text" name="username" id="username" size="60" maxlength="15" class="required" />
					</p>
					<p>
						<label for="password"><span>*</span>Password: </label> 
						<input type="password" name="password" id="password" size="60" maxlength="10" class="required" />
					</p>
					<p>
						<label for="password_confirm"><span>*</span>Confirm Password: </label> 
						<input type="password" name="password_confirm" id="password_confirm" size="50" maxlength="10" class="required" />
					</p>
					<p>
	                	<span>*<strong> :Required</strong></span>
						<input name="submit" type="submit" id="mySubmit" class="button" value="Submit" />
						<input name="reset" type="reset" value="Reset" class="button" />
                    </p>
                    <p><?=$newDatabae->showMessage(); ?></p>
                    <p>
                        If you have an account, click here.<a href="login.php"><input name="login" type="button" class="button" value="Log-in >>" /></a>
					</p>
                    <p><?=$message; ?></p>
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
