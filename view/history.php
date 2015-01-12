<?php
/* Name: Iran Vision / History Of Iran
   Author: Farhood Rashidi
   Date: 01/06/2015
   This script shows "History Of Iran" web page from database. 
*/

include '../model/database.php';

$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
include 'include/include_header.php';
include 'include/include_nav.php';
$Webpage = "History Of Iran";
$newDatabae->query($Webpage);
include 'include/include_footer.php';
$newDatabae->disconnect(); 