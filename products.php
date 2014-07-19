<!-- Name: Shien Hong --> 

<?php
	$title = " Gundam Model Kit";
	$description = "Gundam Model Kit - Products Page";
	include 'filler/header.php';
?>

<?php
	$DBH = new PDO("mysql:host=localhost;dbname=hw4", 'root', '');
	$stmt = $DBH->prepare("SELECT * FROM product");
	$stmt->execute();
	$products = $stmt -> fetchAll(PDO::FETCH_ASSOC);
?>

        
<main id="main">
	<section id="products">
		<h2>Product Listing</h2>

		<?php
			foreach ($products as $product){
				$productName = str_replace('-', ' ', $product['name']);
				echo '<div class="productSummary">';
				echo '<a href=product.php?product=' . $product['name'] . '> <img class="d1" src="images/products/' . $product['image'] . '" alt="A ' . $product['name'] . ' model" />';
				echo '<div class="contenthover">';
				echo '<h3>' . $productName . '</h3>';
				echo '<p>$' . $product['price'] . '</h3>';
				echo '</div>';
				echo '</div>';
			}
		?>
	</section>

	<script src="js/contentHover.js"></script>
	<script>
		$('.d1').contenthover({
		    overlay_background:'#000',
		    overlay_opacity:0.8
		});
	</script>
	
	
    
</main>
<?php
	include 'filler/footer.php';
?>