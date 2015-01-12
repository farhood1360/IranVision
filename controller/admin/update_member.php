<?php
/* Name: Iran Vision / Update Members
   Author: Farhood Rashidi
   Date: 01/06/2015
   This script gets the member's first name and last name, and then add the member id, editor id, start date, and end date. 
*/

include '../../model/database.php';

if(isset($_POST["submit"])){
	if(empty($_POST['memberid']) || empty($_POST['editorid']) || empty($_POST['start']) || empty($_POST['end']) || empty($_POST['fname']) || empty($_POST['lname'])){
		$message = "<p style='color: red'>You must enter member's first name, last name, member id, editor id, start date ,and end date. <br> Click the submit agian.</p>";
	}else{
		if(preg_match("/^[0-9]{3}$/i", $_POST['memberid']) != 1){
			$message = "<p style='color: red'>The member id must be 3 numbers. <br> Click the submit button for registration agian.</p>";
		}else{
			if(preg_match("/^[0-9]{3}$/i", $_POST['editorid']) != 1){
				$message = "<p style='color: red'>The editor id must be 3 numbers.<br> Click the submit button for registration agian.</p>";
			}else{
				$fname = addslashes($_POST['fname']);
				$lname = addslashes($_POST['lname']);
				$memberid = addslashes($_POST['memberid']);
				$editorid = addslashes($_POST['editorid']);
				$datestart = addslashes($_POST['start']);
				$dateend = addslashes($_POST['end']);
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
$newDatabae->update_member($memberid, $editorid, $datestart, $dateend, $fname, $lname);
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
		<title>Iran Vision :: Update Member</title>
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
			<h2>Update Member</h2>
			<article>
				<p style="text-align:center">Please update the member's information.</p>
				
				<!-- Begin Form -->
				<form name="updateForm" id="updateForm" method="post" action="update_member.php" >
					<p>
						<label for="fname"><span>*</span>First Name: </label> 
						<input name="fname" id="fname" type="text" size="55" maxlength="50" autofocus/>
					</p>
					<p>
						<label for="lname"><span>*</span>Last Name: </label> 
						<input name="lname" id="lname" type="text" size="55" maxlength="50" />
					</p>
					<p>
						<label for="memberid"><span>*</span>Member ID: </label>
						<input name="memberid" type="text" id="memberid" size="55" maxlength="3" />
					</p>
					<p>
						<label for="editorid"><span>*</span>Editor ID: </label>
						<input name="editorid" id="editorid" type="text" size="57" maxlength="3" />
					</p>
					<p>
						<label for="start"><span>*</span>Date Start: </label> 
						<input type="date" name="start" id="start" size="55" maxlength="20" class="required" />
					</p>
					<p>
						<label for="end"><span>*</span>Date End: </label> 
						<input type="date" name="end" id="end" size="55" maxlength="20" class="required" />
					</p>
					<p>
						<input name="submit" type="submit" id="mySubmit" class="button" value="Submit" />
						<input name="reset" type="reset" value="Reset" class="button" />
                    </p>
                    <span>*<strong> :Required</strong></span>
                    <p>
                    	Click here for view the updated members.
                    	<a href='../../view/members.php'><input type='button' name='member' class='button' value='Updated Members >>' ></a>
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
