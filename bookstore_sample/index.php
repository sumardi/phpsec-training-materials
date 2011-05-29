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
 */?>
<?php ob_start(); ?>
<?php session_start(); ?>
<?php require_once("dbconnect.php") ?>
<?php include_once("header.php") ?>
<?php define("IS_IN_SCRIPT", 1) ?>

<div class="container">
	<div id="header" class="span-24 last">
		<h1><a href="index.php">XYZ Online BookStore</a></h1>
	</div>
	<hr />
	
	    <div class="span-17 colborder" id="content">
        	<?php 
        	
        	$page = $_GET['page'];
        	
        	if(empty($page)) {
        		$page = "featured";
        	}
        	
        	include_once("{$page}.php");
        	
        	?>
        </div>

        <div class="span-6 last" id="sidebar">
        
        <?php if(!isset($_SESSION['logged'])) : ?>
		  <a href="index.php?page=register">Sign Up</a> | <a href="index.php?page=login">Sign In</a><br /><br />
		<?php else : ?>
			Welcome, 
			<?php if(isset($_SESSION['admin'])) : ?>
				<b><?php echo $_SESSION['admin'] ?></b>
			<?php else : ?>
				<b><a href="index.php?page=profile"><?php echo $_SESSION['user'] ?></a></b>
			<?php endif;?>
			[<a href="index.php?page=logout">Logout</a>]<br /><br />
		<?php endif; ?>
		
		<?php if(isset($_SESSION['admin'])) : ?>
		
		  <div class="prepend-top" id="recent-reviews">
            <h3 class="caps">Admin Menu</h3>
            <div class="box">
              <a href="index.php?page=dashboard" class="quiet">Dashboard</a><br />
              <a href="index.php?page=manage_customers" class="quiet">Manage Customers</a><br />
              <a href="index.php?page=manage_books" class="quiet">Manage Books</a>
            </div>

          </div>
          
       <?php endif; ?>
       
          <div id="recent-books">
            <h3 class="caps">Recent Books</h3>

            <div class="box">
            <?php 
            	$sql3 = "SELECT * FROM books ORDER BY id DESC LIMIT 0,3";
            	$query3 = mysql_query($sql3) or die(mysql_error());
            	while($row3 = mysql_fetch_assoc($query3)) :
            ?>
            
              <a href="index.php?page=book_page&id=<?php echo $row3['id'] ?>" class="quiet"><?php echo $row3['book_title'] ?></a>
              <div class="quiet"><?php echo date("M. d, Y", strtotime($row3['book_date']))?></div>
              <br />
            <?php endwhile; ?>
            </div>

          </div>

          <div class="prepend-top" id="recent-reviews">
            <h3 class="caps">Recent Reviews</h3>
            <div class="box">
            <?php 
            
            $sql4 = "SELECT * FROM reviews LEFT JOIN books ON books.id = reviews.bid 
        			LEFT JOIN customers ON reviews.cid = customers.id ORDER BY reviews.id DESC LIMIT 0,3";
            $query4 = mysql_query($sql4) or die(mysql_error());
            while($row4 = mysql_fetch_assoc($query4)) :
            
            ?>
            
              <span class="quiet"><?php echo $row4['name']?> reviewed <?php echo $row4['book_title'] ?></span>
              <div class="quiet">Rating: <?php echo $row4['rate']?>/5</div>
              <a href="index.php?page=book_page&id=<?php echo $row4['bid'] ?>" class="quiet">Read this review</a>
              <br /><br />
            <?php endwhile; ?>  
            </div>

          </div>
          
        </div>

        <hr />
    
</div>

<?php include_once("footer.php") ?>