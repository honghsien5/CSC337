<!-- Name: Shien Hong --> 


<?php
	$title = " Gundam Model Kit";
	$description = "Gundam Model Kit - Product Page";
	include 'filler/header.php';
?>

<?php
	
	if (isset($_GET['product'])) {
		$productName = $_GET['product'];
	}
	$cleanProductName = filter_var($productName, FILTER_SANITIZE_STRING);
	$cleanProductName = htmlentities($cleanProductName);

	$DBH = new PDO("mysql:host=localhost;dbname=hw4", 'root', '');
	$stmt = $DBH -> prepare("SELECT * FROM product WHERE name = :pname");
	$stmt -> bindValue(':pname', $cleanProductName, PDO::PARAM_STR); 
	$stmt -> execute();
	$product = $stmt -> fetch();
	$productName = str_replace('-', ' ', $productName); //might need fixes
?>




<main id="main">
	
	<h2><?php echo $productName ?></h2>
	<?php echo $cleanProductName?>
	<div id="product">
		<img src="images/products/<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?> model"  >
		<form name="productForm"  action="cart.php" onsubmit="return validateProduct()" method="post">
			<fieldset>
				<legend>Add to Cart</legend>
				<h3>$<?php echo number_format($product['price'],2); ?></h3>
				<label for="quantity">Quantity</label>
				<input id="quantity" type="text" name="quantity" />
				<input type="hidden" name="product_name" value="<?php echo $product['name']; ?>" />
				<input type="submit" value="Add" />
			</fieldset>
		</form>
		
		<?php echo $product['description'] ; ?>
	</div>

	<script>
		function validateProduct(){
			var temp=document.forms["productForm"]["quantity"].value;
			if(temp > 0){
				return true;
			}else{
				alert("Quantity needs to be bigger than zero")
				return false;
			}
		}
	</script>
		
	
	
</main>
<?php
	include 'filler/footer.php';
?>
