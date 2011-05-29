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

$sql = "SELECT * FROM books WHERE featured = '1' LIMIT 0,3";
$query = mysql_query($sql) or die(mysql_error());

while($row = mysql_fetch_assoc($query)) : 

?>
<h2 class="loud">Featured Book : <?php echo $row['book_title'] ?></h2>
         <?php if(!empty($row['book_img'])) : ?>
    	<p>
   			<img class="right" src="images/<?php echo $row['book_img'] ?>" alt="featured book" />
   		</p>
   		<?php endif; ?>

          <p>
          	<?php echo nl2br($row['book_description']) ?>
          </p>
          
          <p>
          	<a href="index.php?page=book_page&id=<?php echo $row['id'] ?>">>> View Book</a>
          </p>
<br /><br /><br />          
<?php endwhile; ?>