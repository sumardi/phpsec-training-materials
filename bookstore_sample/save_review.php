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
require_once("dbconnect.php");

if(!isset($_SESSION['cid'])) {
	header("location:index.php?page=login");exit();
}

if($_POST) {
	$comment = $_POST['comment'];
	$rate = $_POST['rate'];
	$bid = $_POST['bid'];
	$cid = $_SESSION['cid'];
	
	$sql = "INSERT INTO reviews SET comment = '{$comment}',
				rate = '{$rate}', bid = {$bid}, cid = {$cid}";
	$query = mysql_query($sql) or die(mysql_error());
	if($query) {
		header("location:index.php?page=book_page&id={$bid}");exit();
	}
}

?>