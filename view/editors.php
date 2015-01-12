<?php
/* Name: Iran Vision / Editors List
   Author: Farhood Rashidi
   Date: 01/06/2015
   This script could be connected to database and then displays the editors'data stored in database. 
*/

include '../model/database.php';

$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
include 'include/include_header.php';
include 'include/include_nav.php';
echo "<h2>Editors List</h2><article><p style='text-align: center'>The table below displays editors' data stored in database.</p><table><tr>";
echo "<th>Ediotr ID</th><th>Last Name</th><th>First Name</th><th>Email Address</th><th>Phone Number</th><th>Street</th><th>City</th><th>State</th><th>zip Code</th></tr>"; 
$newDatabae->query_editors();
echo "</table><p>Click here for updating the members list.<a href='../controller/admin/update_editor.php'><input type='button' class='button' value='Update Editors >>' ></a></p>";
echo "<p>Click here for deleting the members.<a href='../controller/admin/delete_editor.php'><input type='button' class='button' value='Delete Editors >>' ></a></p>";
echo "<p>Click here for return to Log-in Page.<a href='../model/login.php'><input type='button' class='button' value='<< Log-in' /></a></p><br/></article>";
include 'include/include_footer.php';
$newDatabae->disconnect();