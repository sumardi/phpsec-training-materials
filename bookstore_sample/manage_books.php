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
 * You should have received a copy of the GNU General Public License along with Mahua Framework. 
 * If not, see <http://www.gnu.org/licenses/>
 *
 * WARNING: This application contains multiple vulnerabilities. DO NOT use for your production site.
 */
 ?>
<h3 class="loud">Manage Books</h3>
<a href="index.php?page=new_book">New Book</a><br /><br />
<?php 

if(!isset($_SESSION['admin'])) {
	header("location:index.php?page=admin");exit();
}

require("dbconnect.php");

$sql = "SELECT * FROM books ORDER BY book_title ASC";
$query = mysql_query($sql) or die(mysql_error());

$count = 0;

echo "<table border=\"2\" width=\"100%\">";
echo "<thead><tr><th></th><th>Title</th><th>Price</th><th>Action</th></tr></thead>";
while($row = mysql_fetch_array($query)) {
	echo "<tbody><tr><td>
			" . ++$count . "</td>
			<td><a href=\"index.php?page=book_page&id={$row['id']}\">{$row['book_title']}</a></td>
			<td>RM{$row['book_price']}</td>
			<td><a href='index.php?page=update_book&id={$row['id']}'>Update</a></td></tr></tbody>";
}
echo "</table>";

?>