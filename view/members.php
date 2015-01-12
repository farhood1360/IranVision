<?php
/* Name: Iran Vision / Members List
   Author: Farhood Rashidi
   Date: 01/06/2015
   This script could be connected to database and then displays the members'data stored in database. 
*/
	
include '../model/database.php';

$newDatabae = new Database();
$newDatabae->connection();
$newDatabae->select();
include 'include/include_header.php';
include 'include/include_nav.php';
echo "<h2>Members List</h2><article><p style='text-align: center'>The table below displays members' data stored in database.</p><table><tr>";
echo "<th>Member ID</th><th>Last Name</th><th>First Name</th><th>Email Address</th><th>Phone Number</th><th>User Name</th><th>Date Start</th><th>Date End</th><th>Editor ID</th></tr>"; 
$newDatabae->query_members();
echo "</table><p>Click here for updating the members list.<a href='../controller/admin/update_member.php'><input type='button' class='button' value='Update Members >>' ></a></p>";
echo "<p>Click here for deleting the members.<a href='../controller/admin/delete_member.php'><input type='button' class='button' value='Delete Members >>' ></a></p>";
echo "<p>Click here for return to Log-in Page.<a href='../model/login.php'><input type='button' class='button' value='<< Log-in' /></a></p><br/></article>";
include 'include/include_footer.php';
$newDatabae->disconnect();