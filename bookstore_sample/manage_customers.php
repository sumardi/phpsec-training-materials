<?php
/**
 * Bookstore
 * a sample web application for php security course
 *
 * @author		Sumardi Shukor <smd@php.net.my>
 * @license		GNU GPL
 * @version		0.0.1
 * 
 * You can redistribute it and/or modify it under the terms of 
 * the GNU General Public License as published by the Free Software Foundation; either version 2 
 * of the License, or (at your option) any later version.
 * 
 * You should have received a copy of the GNU General Public License along with this application. 
 * If not, see <http://www.gnu.org/licenses/>
 *
 * WARNING: This application contains multiple vulnerabilities. DO NOT use for your production site.
 */
 ?>
<h3 class="loud">Manage Customers</h3>

<?php 

if(!isset($_SESSION['admin'])) {
	header("location:index.php?page=admin");exit();
}

require("dbconnect.php");

$sql = "SELECT * FROM customers ORDER BY name ASC";
$query = mysql_query($sql) or die(mysql_error());

$count = 0;

echo "<table border=\"2\" width=\"100%\">";
echo "<thead><tr><th></th><th>Name</th><th>Email</th><th>Action</th></tr></thead>";
while($row = mysql_fetch_array($query)) {
	echo "<tbody><tr><td>
			" . ++$count . "</td>
			<td><a href=\"index.php?page=profile&id={$row['id']}\">{$row['name']}</a></td>
			<td>{$row['email']}</td>
			<td><a href='index.php?page=update_customer&id={$row['id']}'>Update</a></td></tr></tbody>";
}
echo "</table>";

?>