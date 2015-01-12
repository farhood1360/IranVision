<?php
/* Name: Iran Vision / Log In
   Author: Farhood Rashidi
   Date: 01/06/2015
   This script gets the member's username and password and then displays the log-in message or error message. 
*/

$auth = false;
$message = "&#160;";
if(isset($_POST["login"])){
	if(empty($_POST['username']) ||  empty($_POST['password'])){
		$message = "<p style='color: red'>You must enter your user name and password. Click the Log In button for log-in agian.</p>";
	}else{
		if($_POST['username'] == "farhood" &&  $_POST['password'] == "farhood"){
			$message = "<p>" ."Welcome back Manager!" . "<br/><br/>";
			$message .=  "Click here for going to show the editors list. ". "<a href='../view/editors.php'><input type='button' class='button' value='Editors List >>' ></a>". "<br><br>";
			$message .=  "Click here for insert the new editors. ". "<a href='../controller/admin/admin.php'><input type='button' class='button' value='Insert Editors >>' ></a>". "<br><br>";
			$message .=  "Click here for updating the editors list. ". "<a href='../controller/admin/update_editor.php'><input type='button' class='button' value='Update Editors >>' ></a>". "<br><br>";
			$message .=  "Click here for deleting the editors. ". "<a href='../controller/admin/delete_editor.php'><input type='button' class='button' value='Delete Editors >>' ></a>";
		}else if($_POST['username'] == "zini" &&  $_POST['password'] == "zenobia"){
			$message = "<p>" ."Welcome back Editor!" . "<br/><br/>";
			$message .=  "Click here for going to show the members list. ". "<a href='../view/members.php'><input type='button' class='button' value='Members List >>' ></a>". "<br><br>";
			$message .=  "Click here for updating the members list. ". "<a href='../controller/admin/update_member.php'><input type='button' class='button' value='Update Members >>' ></a>". "<br><br>";
			$message .=  "Click here for deleting the members. ". "<a href='../controller/admin/delete_member.php'><input type='button' class='button' value='Delete Members >>' ></a>";
		}else{
			$UserName = strtolower($_POST['username']);
			$Password = strtolower($_POST['password']);
			$link = @mysql_connect($host, $username, $password);
			if($link === FALSE){
				die("Error connecting to data server.");
			}
			$database = "Iran Vision";
			if(@mysql_selectdb($database, $link) === FALSE){
				die("Error selecting database.");
			}
			$table = "Members";
			$rows = mysql_query("SELECT user_name, password FROM $table", $link);
			while($row = mysql_fetch_array($rows)){
				if($UserName == $row["user_name"] && $Password == $row["password"]){
					$auth = true;
					break;
				}
			}
			if($auth){
				$_SESSION["user"] = $UserName;
				if(isset($_GET["url"])){
					$url = $_GET["url"];
				}else{
					$url = "../index.php";
				}
				$message = "<p>" ."Welcome! Log-in successfully." . "<br/>";
				$message .=  "Click here for going to the home page. ". "<a href='../index.php'><input type='button' name='home' class='button' value='Home page >>' ></a>". "<br><br>";
				$message .=  "Click here for going to the survey page. ". "<a href='../controller/survay.php'><input type='button' name='home' class='button' value='Survey page >>' ></a>". "<br><br>";
				$message .=  "Click here for going to the content managment page. ". "<a href='../../controller/cms.php'><input type='button' name='home' class='button' value='CMS page >>' ></a>". "<br><br>";
			}else{
				$message = "<p style='color: red'>Sorry! Try agian. User name or password is not correct.</p>" . "<br>";
			}
		}
	}
}

if(isset($_POST["reset"])){
	$message = "";
}

if(isset($_POST["logout"])){
	$message = "<p>You 've logged out. <a href='../index.php'><input name='home' type='button' class='button' value='<< Home Page' /></a></p>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<!-- 
    	Programmer: Farhood Rashidi
        Date: 12/13/2012
        Name: Iran Vision
    -->
     
    <!-- header start hear -->
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="description" content
    =" This web site promotes the Pasargad Company including Iran vision (history and culture) and Zoroastrian vision (tradition, region and history)."/>
        <meta name="keywords" content=" zoroaster, persian, history of iran, iran, zoroastrianism, culture of iran, history of zoroastrain, tradition of zoroastrain, farsi"/>
		<title>Iran Vision :: Sign In</title>
   		<link  href="../css/zna.css" rel="stylesheet" type="text/css" />
        <script src="js/iranvision.js" type="text/javascript"></script>
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
			<h2>Sign In</h2>
			<article>
                <p style='text-align: center'>Please enter the user name and password on "log-in" form.</p>
				<form name="loginForm" id="loginForm" class="form" method="post" action="login.php">
						<label for="username"><span>*</span>User Name: </label> 
						<input type="text" name="username" id="username" size="60" autofocus />
					</p>
						<label for="password"><span>*</span>Password: </label> 
						<input type="password" name="password" id="password" size="60" />
					</p>
					<span>*<strong> :Required</strong></span>
					<p>
						<input type="submit" name="login" id="mySubmit" class="button" value="Login" />
                        <input name="reset" type="reset" class="button" value="Reset" />
                        <input type="submit" name="logout" id="logout" class="button" value="Logout" />
                        <?=$message; ?>
                    </p>
                    <p>
                        If you have not an account, click here.<a href="contactus.php"><input name="register" type="button" class="button" value="<< Register" /></a>
					</p>
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