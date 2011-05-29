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
require_once("dbconnect.php");

if(isset($_SESSION['logged'])) {
	header("location:index.php"); exit;
}

if($_POST) {
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	
	$sql = "SELECT * FROM customers WHERE email = '{$email}' AND 
				pass = '{$pass}'";
	$query = mysql_query($sql) or die(mysql_error());
	$num_rows = mysql_num_rows($query);
	
	if($num_rows > 0) {
		$row = mysql_fetch_assoc($query) or die(mysql_error());
		$_SESSION['logged'] = true;
		$_SESSION['user'] = $row['name'];
		$_SESSION['cid'] = $row['id'];
		header("location:index.php?page=profile"); exit();
	} else {
		header("location:index.php?page=login&message=Authentication Failed! Please try again."); exit();
	} 
}


?>

<?php 
	if(isset($_GET['message'])) {
		echo "<div class=\"notice\">{$_GET['message']}</div>";
	}
?>
		
<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?page=login">
	<fieldset>
		<legend>Member Login</legend>
		<p>
			<label for="email">Email : </label><br />
			<input type="text" class="title" name="email" size="50" />
		</p>	
		<p>
			<label for="pass">Password : </label><br />
			<input type="password" class="title" name="pass" size="50" /> 
		</p>	
		<p>
			<input type="submit" value="Login" />
		</p>
	</fieldset>
</form>