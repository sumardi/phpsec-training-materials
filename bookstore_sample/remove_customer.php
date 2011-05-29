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
require("dbconnect.php");

if(!isset($_SESSION['admin'])) {
	header("location:index.php?page=admin");exit();
}

if(isset($_GET['id'])) {
	$sql = "DELETE FROM customers WHERE id = {$_GET['id']}";
	$query = mysql_query($sql) or die(mysql_error());
	if($query) {
		header("location:index.php?page=manage_customers");exit();
	}
}

?>