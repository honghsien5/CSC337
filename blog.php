<!-- Name: Shien Hong --> 

<?php
	$title = " Gundam Model Kit";
	$description = "Gundam Model Kit - Blog Page";
	include 'filler/header.php';
?>

<?php
	$DBH = new PDO("mysql:host=localhost;dbname=hw4", 'root', '');
	$stmt = $DBH->prepare("SELECT * FROM blog");
	$stmt->execute();
	$blogs =$stmt -> fetchAll(PDO::FETCH_ASSOC);

?>

<main id="main">

	<h2>Blog List</h2>
	
	<div class="blogs">
		<?php
			foreach ($blogs as $blog){
				$blogTitle = str_replace('-', ' ', $blog['title']); 
				echo '<div class="blog">';
				echo '<a href="article.php?blog=' . $blog['title'] . '"><img src="images/blogs/' . $blog['image'] . '" alt="' . $blog['title'] . 'article"></a>';
				echo '<h2>' . $blogTitle . '</h2>';
				echo '<p class="date">' . $blog['post_date'] . '</p>';
				echo '<p><a href="article.php?blog=' . $blog['title'] . '">[...] Read More</a></p>' ;
				echo '</div>';
			}	

		?>
	</div>
	

</main>

<?php
	include 'filler/footer.php';
?>