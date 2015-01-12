<?php
/* Name: Iran Vision/ About Us
   Author: Farhood Rashidi
   Date: 01/06/2015
   This script shows "About Us" web page from database. 
*/

include '../model/database.php';

$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
include 'include/include_header.php';
include 'include/include_nav.php';
$Webpage = "About Us";
$newDatabae->query($Webpage);
include 'include/include_footer.php';
$newDatabae->disconnect();