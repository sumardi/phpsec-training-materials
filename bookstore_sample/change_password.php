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

if($_POST) {
	$pass = $_POST['pass'];
	$id = $_SESSION['cid'];
	
	$sql = "UPDATE customers SET pass = '{$pass}' WHERE id = {$id}";
	$query = mysql_query($sql) or die(mysql_error());
	if($query) {
		header("location:index.php?page=profile");exit();
	}
}

?>

<h3 class="loud">Change Password</h3>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?page=change_password">
	<fieldset>
		<legend>Customer Information</legend>
		<p>
			<label for="pass">Change Password : </label><br />
			<input type="password" class="title" name="pass" size="50" />
		</p>	
		<p>
			<input type="submit" value="Submit" />
			<input type="reset" value="Reset" />
		</p>
	</fieldset>
</form>