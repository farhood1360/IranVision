<?php
/* Name: Iran Vision / Webpages List
   Author: Farhood Rashidi
   Date: 01/06/2015
   This script displays the webpages list. 
*/

include '../model/database.php';

$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
include 'include/include_header.php';
include 'include/include_nav.php';
echo "<h2>Webpages List</h2><article><p style='text-align:center'>The table below displays list of webpages.</p><table>";
echo "<tr><th>Page Name</th><th>Category</th><th>Editor ID</th></tr>";
$newDatabae->query_pages();
echo "</table><br/></article>";
include 'include/include_footer.php';
$newDatabae->disconnect();

