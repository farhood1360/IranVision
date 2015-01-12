<?php
/* Name: Iran Vision / Tradition
   Author: Farhood Rashidi
   Date: 01/06/2015
   This script shows "Tradition Of Zoroastrian" web page from database. 
*/

include '../model/database.php';

$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
include 'include/include_header.php';
include 'include/include_nav.php';
$Webpage = "Tradition Of Zoroastrian";
$newDatabae->query($Webpage);
include 'include/include_footer.php';
$newDatabae->disconnect(); 