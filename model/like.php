<?php
/* Name: Iran Vision / Like
   Author: Farhood Rashidi
   Date: 01/16/2015
   This script gets the content and comment's likes. 
*/

include 'database.php';

if(isset($_GET['content_like'])){
	$contentlike = $_GET['content_like'] +1;
	$contentid = $_GET['content_id'];
	$page = $_GET['page_id'];
}

if(isset($_GET['comment_like'])){
	$commentlike = $_GET['comment_like'] +1;
	$commentid = $_GET['comment_id'];
	$page = $_GET['page_id'];
}

$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
$newDatabae->update_content_like($contentid, $contentlike);
$newDatabae->update_comment_like($commentid, $commentlike);
$newDatabae->disconnect();

if($page === 'Zoroastrianism'){
	header('LOCATION: ../view/zoroastrian.php');
}elseif($page === 'Culture Of Iran'){
	header('LOCATION: ../view/culture.php');
}elseif($page === 'History Of Zoroastrian'){
	header('LOCATION: ../view/historyofzoroastrian.php');
}elseif($page === 'Tradition Of Zoroastrian'){
	header('LOCATION: ../view/tradition.php');
}elseif($page === 'History Of Iran'){
	header('LOCATION: ../view/history.php');
}else{
	header('LOCATION: ../view/aboutus.php');
}
