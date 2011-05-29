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

if($_POST) {
	$book_title = $_POST['book_title'];
	$description = mysql_real_escape_string($_POST['description']);
	$book_price = $_POST['book_price'];
	$upload_image = $_FILES['upload_image'];
	$book_date = date("Y-m-d", time());
	
	$sql = "INSERT INTO books SET book_title = '{$book_title}', 
				book_description = '{$description}', book_price = '{$book_price}',
				book_date = '{$book_date}'";
	$query = mysql_query($sql) or die(mysql_error());
	if($query) {
		header("location:index.php?page=manage_books"); exit;
	} else {
		echo "<div class=\"notice\">{$_GET['message']}</div>";
	}
}

?>

<h3 class="loud">New Book</h3>

<form method="post" action="<?php $_SERVER['PHP_SELF'] ?>" enctype="application/x-www-form-urlencoded">
	<fieldset>
		<legend>Book Information</legend>
		<p>
			<label for="book_title">Book Name : </label><br />
			<input type="text" class="text" name="book_title" style="width:500px;" />
		</p>	
		<p>
			<label for="description">Description : </label><br />
			<textarea name="description" style="width:500px;"></textarea>
		</p>
		<p>
			<label for="book_price">Price : RM</label>
			<input type="text" class="text" name="book_price" style="width:100px;" />
			&nbsp;&nbsp;&nbsp;&nbsp;
			<label for="upload_image">Image : </label>
			<input type="file" name="upload_image" style="width:300px;" />
		</p>
		<p>
			<input type="submit" name="submit" value="Submit" /> 
			<input type="reset" name="reset" value="Reset" />
			<a href="index.php?page=manage_books"><< Back</a>
		</p>
	</fieldset>
</form>