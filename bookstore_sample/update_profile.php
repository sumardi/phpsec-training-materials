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

if(!isset($_SESSION['cid'])) {
	header("location:index.php?page=login");exit();
}

if(isset($_SESSION['cid'])) {
	$id = $_SESSION['cid'];
	
	$sql = "SELECT * FROM customers WHERE id = {$id}";
	$query = mysql_query($sql) or die(mysql_error());
	$row = mysql_fetch_array($query) or die(mysql_error());
}

if($_POST) {
	$id = $_POST['id'];
	$email = $_POST['email'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	
	$sql = "UPDATE customers SET email = '{$email}',
			name = '{$name}', address = '{$address}',
			phone = '{$phone}' WHERE id = {$id}";
	$query = mysql_query($sql) or die(mysql_error());
	if($query) {
		header("location:index.php?page=profile&id={$id}"); exit();
	}
}

?>

<h3 class="loud">Update Customer Profile</h3>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?page=update_profile">
	<fieldset>
		<legend>Customer Information</legend>
		<p>
			<label for="email">Email : </label><br />
			<input type="text" class="title" name="email" size="50" value="<?php echo $row['email'] ?>" />
		</p>	
	</fieldset>
	
	<fieldset>
		<legend>Billing Information</legend>
		<p>
			<label for="name">Full Name : </label><br />
			<input type="text" class="text" name="name" size="50" value="<?php echo $row['name'] ?>" />
		</p>	
		<p>
			<label for="address">Address : </label><br />
			<textarea name="address" rows="1" cols="10"><?php echo $row['address'] ?></textarea>
		</p>
		<p>
			<label for="phone">Mobile Phone : </label>
			<input type="text" class="text" name="phone" size="50" value="<?php echo $row['phone'] ?>" />
		</p>
	</fieldset>
	<p>
			<input type="submit" name="submit" value="Submit" /> 
			<input type="reset" name="reset" value="Reset" />
			<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
			<a href="index.php?page=manage_customers"><< Back</a>
		</p>
</form>