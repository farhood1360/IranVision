<?php
/* Name: Iran Vision / Culture of Iran
   Author: Farhood Rashidi
   Date: 01/06/2015
   This script shows "Culture of Iran" web pages from database. 
*/

include '../model/database.php';

$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
include 'include/include_header.php';
include 'include/include_nav.php';
$Webpage = "Culture Of Iran";
$newDatabae->query($Webpage);
include 'include/include_footer.php';
$newDatabae->disconnect(); 