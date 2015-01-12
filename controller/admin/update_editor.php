<?php
/* Name: Iran Vision / Update Editors
   Author: Farhood Rashidi
   Date: 01/06/2015
   This script gets the editors' first name and last name, and then update editor id, email address , and phone number. 
*/

include '../../model/database.php';

if(isset($_POST["submit"])){
	if(empty($_POST['editorid']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['address']) || empty($_POST['city']) || empty($_POST['zip']) || empty($_POST['fname']) || empty($_POST['lname'])){
		$message = "<p style='color: red'>You must enter member's first name, last name, editor id, email address , phone number, address, city, and zip code. <br> Click the submit agian.</p>";

	}else{
		if(preg_match("/^[0-9]{3}$/i", $_POST['editorid']) != 1){
			$message = "<p style='color: red'>The editor id must be 3 numbers.<br> Click the submit button agian.</p>";
		}else{
			if(preg_match("/^[a-z0-9\._-]+@+[a-z0-9\._-]+\.+[a-z]{2,3}$/i", $_POST['email']) != 1){
				$message = "<p style='color: red'>The email field was invalid. <br> Click the submit button agian.</p>";
			}else{
				if(preg_match("/^\(([2-9][0-9]{2})\)[2-9][0-9]{2}-[0-9]{4}$/i", $_POST['phone']) != 1){
					$message = "<p style='color: red'>The phone field was invalid. <br> Click the submit button agian.</p>";
				}else{
					if(preg_match("/^[0-9]{5}$/i", $_POST['zip']) != 1){
						$message = "<p style='color: red'>The zipcode must be 5 numbers.<br> Click the submit button agian.</p>";
					}else{
						$fname = addslashes($_POST['fname']);
						$lname = addslashes($_POST['lname']);
						$editorid = addslashes($_POST['editorid']);
						$email = addslashes($_POST['email']);
						$phone = addslashes($_POST['phone']);
						$address = addslashes($_POST['address']);
						$city = addslashes($_POST['city']);
						$zipcode = addslashes($_POST['zip']);
					}
				}
			}
		}
	}
}

if(isset($_POST["reset"])){
	$message = "";
}

if(isset($_POST["back"])){
	header('Location: ../../model/login.php');
}

$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
$newDatabae->update_editor($editorid, $email, $phone, $address, $city, $zipcode, $fname, $lname);
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
		<title>Iran Vision :: Update Editors</title>
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
			<h2>Update Editors</h2>
			<article>
				<p style="text-align:center">Please update the editor's information.</p>
				
				<!-- Begin Form -->
				<form name="updateForm" id="updateForm" method="post" action="update_editor.php" >
					<p>
						<label for="fname"><span>*</span>First Name: </label> 
						<input name="fname" id="fname" type="text" size="55" maxlength="20" autofocus/>
					</p>
					<p>
						<label for="lname"><span>*</span>Last Name: </label> 
						<input name="lname" id="lname" type="text" size="55" maxlength="20" />
					</p>
					<p>
						<label for="editorid"><span>*</span>Editor ID: </label>
						<input name="editorid" id="editorid" type="text" size="57" maxlength="3" />
					</p>
					<p>
						<label for="email"><span>*</span>Email Address: </label> 
						<input type="text" name="email" id="email" size="50" maxlength="50" class="required" />
					</p>
					<p>
						<label for="phone"><span>*</span>Phone Number: </label> 
						<input type="text" name="phone" id="phone" size="50" maxlength="20" class="required" />
					</p>
					<p>
						<label for="address"><span>*</span>Address: </label> 
						<input type="text" name="address" id="address" size="60" maxlength="50" class="required" />
					</p>
					<p>
						<label for="city"><span>*</span>City: </label> 
						<input type="text" name="city" id="city" size="65" maxlength="20" class="required" />
					</p>
					<p>
						<label for="zip"><span>*</span>ZipCode: </label> 
						<input type="text" name="zip" id="zip" size="60" maxlength="5" class="required" />
					</p>
					<p>
						<input name="submit" type="submit" id="mySubmit" class="button" value="Submit" />
						<input name="reset" type="reset" value="Reset" class="button" />
                    </p>
                    <span>*<strong> :Required</strong></span>
                    <p>
                    	Click here for view the updated members.
                    	<a href='../../view/editors.php'><input type='button' name='member' class='button' value='Updated Editors >>' ></a>
                    </p>
                    <?=$message; ?>
                    <p><?=$newDatabae->showMessage(); ?></p>
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
