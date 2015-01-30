<?php
/* Name: Iran Vision/ Comment Numbers
Author: Farhood Rashidi
Date: 01/06/2015
This script updates the comment numbers into database.
*/

include '../../model/database.php';

session_start();
if(isset($_GET['num_comments_content'])){
	$ccontentNum = $_GET['num_comments_content'] +1;
 	$contenttId = $_GET['content_id'];
	$_SESSION['page'] = $_GET['page_id'];
}

if(isset($_GET['num_comments_comment'])){
	$ccommentNum = $_GET['num_comments_comment'] +1;
	$commentId = $_GET['comment_id'];
	$_SESSION['page'] = $_GET['page_id'];
}


$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
$newDatabae->update_comment_number_content($contenttId, $ccontentNum);
$newDatabae->update_comment_number_comment($commentId, $ccommentNum);
$newDatabae->disconnect();

header('LOCATION: comment.php');
