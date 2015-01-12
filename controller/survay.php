<?php
/* Name: Iran Vision / Survey
   Author: Farhood Rashidi
   Date: 01/06/2015
   This script gets some answare to questions in survey form and then display the result message. 
*/

include '../model/database.php';

if(isset($_POST["submit"])){
	if(!isset($_POST['q1']) || !isset($_POST['q2']) || !isset($_POST['q3']) || !isset($_POST['q5'])){
		$message = "<p style='color: red'>You must answare to all of the required questions. <br> Click the submit button again.</p>";
	}else{
		$q1 = addslashes($_POST['q1']);
		$q2 = addslashes($_POST['q2']);
		$q3 = addslashes($_POST['q3']);
		$q4 = addslashes($_POST['q4']);
		$q5 = addslashes($_POST['q5']);
	}
}

if(isset($_POST["reset"]))
{
	$message = "";
}

$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
$newDatabae->insert_survey($q1, $q2, $q3, $q4, $q5);
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
		<title>Iran Vision :: Survey</title>
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
				<li><a href="../controller/contactus.php">Sign Up</a></li>
				<li><a href="../model/login.php">Sign In</a></li>
			</ul>
      	</nav>	

		<aside>
			<!-- content start hear -->
			<article>
				<h2>Survey</h2>
				<p style='text-align: center'>
					Please fill out the survey form below.
				</p>
				
				<!-- Begin Form -->
				<form name="survayForm" id="survayForm" class="form" method="post" action="survay.php" >
					<p>
						<label for="q1"><span>*</span>Did you like this website? </label> 
						<input name="q1" type="radio" value="Yes" /> Yes <input name="q1" type="radio" value="No" /> No <input name="q1" type="radio" value="Maybee" /> Maybee
					</p>
					<p>
						<label for="q2"><span>*</span>This website was helpfull?  </label> 
						<input name="q2" type="radio" value="Yes" /> Yes <input name="q2" type="radio" value="No" /> No <input name="q2" type="radio" value="Maybee" /> Maybee
					</p>
					<p>
						<label for="q3"><span>*</span>Which category could be achived? </label>
                        <select name="q3">
                       		<option>Select One</option>
                        	<option>Zoroastrianism</option>
                            <option>Iran</option>
                            <option>History</option>
                            <option>Tradition</option>
                            <option>Culture</option>
                        </select>
					</p>
                    <p>
                   		<label or="q4"><span>*</span>What's your position? </label>
                        <select name="q4">
                       		<option>Select One</option>
                        	<option>Reporter</option>
                            <option>Photographer</option>
                            <option>Designer</option>
                            <option>Writer</option>
                        </select>
                    </p>
					<p>
				  	    <label for="q5"><span>*</span>Please write your comment for this website: </label>
                        <textarea name="q5" cols="60" rows="5"></textarea>
					</p>
					<p>
	                	<span>*<strong> :Required</strong></span>
						<input name="submit" type="submit" id="mySubmit" class="button" value="Submit" />
						<input name="reset" type="reset" value="Reset" class="button" /><br>
                    </p>
                    <?=$message; ?>
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
