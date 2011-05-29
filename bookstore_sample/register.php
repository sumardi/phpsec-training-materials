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

if($_POST) {
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	
	$sql = "INSERT INTO customers SET
				email = '{$email}',
				pass = '{$pass}',
				name = '{$name}',
				address = '{$address}',
				phone = '{$phone}'";
	$query = mysql_query($sql) or die(mysql_error());
	if($query) {
		header("location:index.php?page=register&message=Congratulation! You have successfully registered.");
		exit();
	} else {
		header("location:index.php?page=register&message=Registration Failed| Please try again.");
		exit();
	}
}

?>

	<?php 
		
		if(isset($_GET['message'])) {
			echo "<div class=\"notice\">{$_GET['message']}</div>";
		}
		
		?>
<h3 class="loud">Customer Registration</h3>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?page=register">
	<fieldset>
		<legend>Customer Information</legend>
		<p>
			<label for="email">Email : </label><br />
			<input type="text" class="title" name="email" size="50" />
		</p>	
		<p>
			<label for="pass">Password : </label><br />
			<input type="password" class="title" name="pass" size="50" /> 
		</p>	
	</fieldset>
	
	<fieldset>
		<legend>Billing Information</legend>
		<p>
			<label for="name">Full Name : </label><br />
			<input type="text" class="text" name="name" size="50" />
		</p>	
		<p>
			<label for="address">Address : </label><br />
			<textarea name="address" rows="1" cols="10"></textarea>
		</p>
		<p>
			<label for="phone">Mobile Phone : </label>
			<input type="text" class="text" name="phone" size="50" />
		</p>
	</fieldset>
	<p>
			<input type="submit" name="submit" value="Submit" /> 
			<input type="reset" name="reset" value="Reset" />
		</p>
</form>