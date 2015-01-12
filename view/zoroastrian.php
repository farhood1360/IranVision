<?php
/* Name: Iran Vision/ Zoroastrianism
   Author: Farhood Rashidi
   Date: 01/16/2015
   This script shows "Zoroastrianism" web page from database. 
*/

include '../model/database.php';

$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
include 'include/include_header.php';
include 'include/include_nav.php';
$Webpage = "Zoroastrianism";
$newDatabae->query($Webpage);
include 'include/include_footer.php';
$newDatabae->disconnect();