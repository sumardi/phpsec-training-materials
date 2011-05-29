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

if($_GET) {

$sql = "SELECT * FROM books WHERE id = {$_GET['id']}";
$query = mysql_query($sql) or die(mysql_error());
$row = mysql_fetch_assoc($query) or die(mysql_error());

}

?>
	<h2 class="loud"><?php echo $row['book_title'] ?></h2>
		<p><b>Price</b> : RM<?php echo $row['book_price'] ?></p>
		<?php if(!empty($row['book_img'])) : ?>
    	<p>
   			<img class="right" src="images/<?php echo $row['book_img'] ?>" alt="featured book" />
   		</p>
   		<?php endif; ?>
   		<p>
   			<b>Description: </b><br />
   			<?php echo nl2br($row['book_description']) ?>
   		</p>
   		<hr />
        
        <h3>Customer Reviews</h3>
        
        <?php 
        
        $sql2 = "SELECT * FROM reviews LEFT JOIN books ON books.id = reviews.bid 
        			LEFT JOIN customers ON reviews.cid = customers.id 
        			WHERE books.id = {$_GET['id']}";
        $query2 = mysql_query($sql2) or die(mysql_error());
        if(mysql_numrows($query2) > 0) {
	        while($row2 = mysql_fetch_assoc($query2)) {
	        	echo "<blockquote>";
	        		echo nl2br($row2['comment']) . "<br />";
	        		echo " - <a href='index.php?page=member&id=" . $row2['cid'] . "'>" 
	        					. $row2['name'] . "</a>";
	        		echo " (Rating : {$row2['rate']}/5)";
	        	echo  "</blockquote>";
	        }
        } else {
        	echo "No reviews have been submitted yet.<br />";
        }
        
        ?>

<?php if(isset($_SESSION['cid'])) : ?>

<form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>?page=save_review">        
<fieldset>
	<legend>Submit a review</legend>
	<p>
		<label for="comment">Comment :</label><br />
		<textarea name="comment" style="width:400px;height:180px;"></textarea>
	</p>
	<p>
		<label for="rate">Rate : </label>
		<select name="rate"><option>1</option><option>2</option>
		<option>3</option><option>4</option><option>5</option></select>
	</p>
	<p>
		<input type="submit" value="Submit" />
		<input type="reset" value="Reset" />
		<input type="hidden" value="<?php echo $row['id'] ?>" name="bid">
	</p>
</fieldset>
</form>

<?php else : ?>

Please sign in to write a review.

<?php endif; ?>