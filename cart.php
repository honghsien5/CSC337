<!-- Name: Shien Hong --> 

<?php
	$title = " Gundam Model Kit";
	$description = "Gundam Model Kit - Cart Page";
	include 'filler/header.php';
?>

<?php

	session_start();
	
	/*
	if (!isset($SESSION['cart'])) {
		$_SESSION['cart'] = array();
	}
	*/
	
	
	if (isset($_POST['product_name'])) {
		$productName = $_POST['product_name'];
		$cleanProductName = filter_var($productName, FILTER_SANITIZE_STRING);
		$cleanProductName = htmlentities($cleanProductName);

		if (isset($_POST['quantity'])) {
			$quantity = $_POST['quantity'];
			$cleanQuantity = filter_var($quantity, FILTER_SANITIZE_STRING);
			$cleanQuantity = htmlentities($cleanQuantity);
		}
	
		$DBH = new PDO("mysql:host=localhost;dbname=hw4", 'root', '');
		$stmt = $DBH -> prepare("SELECT * FROM product WHERE name = :pname");
		$stmt -> bindValue(':pname', $cleanProductName, PDO::PARAM_STR); 
		$stmt -> execute();
		$product = $stmt -> fetch();
		$price = $product['price'];
		//$cleanProductName = str_replace('-', ' ', $cleanProductName);
		array_push($_SESSION['cart'], array($cleanProductName, $cleanQuantity, $price));
	}

	
	
?>
<main id="main">
	
	<section id="shoppingCart">
		<h2>Shopping Cart</h2>
		
		<div id="cartTable">
			<table>
				<tr>
					<th>Products</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Line Total</th>
					<th></th>
				</tr>
				<?php 
					$total = 0;
				
					foreach( $_SESSION['cart'] as $item){
						$item_name = str_replace('-', ' ', $item[0]);
						echo '<tr>';
						echo '<td>' . $item_name . '</td>';
						echo '<td>$' . number_format($item[2],2) . '</td>';
						echo '<td>' . number_format($item[1],0) . '</td>';
						$sum = $item[2] * $item[1];
						echo '<td>$' . number_format($sum, 2) . '</td>';
						echo '<td class="remove" onclick="removeCartItem(this)" >remove</td>';
						echo '<tr>';
						$total = $total + $sum;
						
					}
				
				?>
				<tr>
					<td colspan="5"></td>
				</tr>
				<tr>
					<td colspan="2"></td>
					<td>Total</td>
					<td id="total">$<?php echo number_format($total,2); ?></td>
				</tr>
			</table>
		
			<form action="shipping.php" method="get">
				<input class="cartButton" type="submit" value="Continue" />
			</form>
		</div>
	</section>
	<script>
			//remove cart item
		function removeCartItem(element){
			var temp = $(element).closest('tr');
			var temp2 = $('td:first', $(element).parents('tr')).text();
			$.post("control/removefromcart.php", {product: temp2});
			temp.remove();
			//var total = document.getElementById("total");
			//console.log(total);
			//console.log(total.text());
			
			//calculate new total
			/*
			<?php
				$total = $total - $_SESSION['sum'];
			?>
			*/

			$("#total").html("$" + <?php echo number_format($total,2); ?>);
			//total.text('$' + <?php echo number_format($total,2); ?>);
				
		}
	</script>


</main>
<?php
	include 'filler/footer.php';
?>