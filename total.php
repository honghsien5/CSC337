<!-- Name: Shien Hong --> 

<?php
	$title = " Gundam Model Kit";
	$description = "Gundam Model Kit - Total Page";
	include 'filler/header.php';
?>
	
<?php
	session_start();
	
	$DBH = new PDO("mysql:host=localhost;dbname=hw4", 'root', '');
	//attributes
	if (isset($_POST['name'])) {
		$name = $_POST['name'];
		$cleanName = filter_var($name, FILTER_SANITIZE_STRING);
		$cleanName = htmlentities($cleanName);
	}
	if (isset($_POST['address'])) {
		$address = $_POST['address'];
		$cleanAddress = filter_var($address, FILTER_SANITIZE_STRING);
		$cleanAddress = htmlentities($cleanAddress);
	}
	if (isset($_POST['city'])) {
		$city = $_POST['city'];
		$cleanCity = filter_var($city, FILTER_SANITIZE_STRING);
		$cleanCity = htmlentities($cleanCity);
	}
	//if (isset($_POST['state'])) {
		$state = $_POST['state'];
		$cleanState = filter_var($state, FILTER_SANITIZE_STRING);
		$cleanState = htmlentities($cleanState);
	//}
	if (isset($_POST['email'])) {
		$email = $_POST['email'];
		$cleanEmail = filter_var($email, FILTER_SANITIZE_STRING);
		$cleanEmail = htmlentities($cleanEmail);
	}
	if (isset($_POST['phone'])) {
		$phone = $_POST['phone'];
		$cleanPhone = filter_var($phone, FILTER_SANITIZE_STRING);
		$cleanPhone = htmlentities($cleanPhone);
	}
	//shipping
	if (isset($_POST['shippingMethod1'])) {
		$shipping = $_POST['shippingMethod1'];	
	}
	if (isset($_POST['shippingMethod2'])) {
		$shipping = $_POST['shippingMethod2'];	
	}
	if (isset($_POST['shippingMethod3'])) {
		$shipping = $_POST['shippingMethod3'];	
	}
	$cleanShipping = filter_var($shipping, FILTER_SANITIZE_STRING);
	$cleanShipping = htmlentities($cleanShipping);

	
	$cleanName = "hong";
	$cleanAddress ="14 flint";
	$cleanCity = "tucson";
	$cleanState ="Arizona";
	$cleanEmail = "gogo@gmail.com";
	$cleanPhone = "1234567890";
	$cleanShipping = "default";
	$complete = 0;
	//insert into order
	$stmt = $DBH->prepare("INSERT INTO `order` (name, address, city, state, email, phone, shipping, order_time, completed)
	 								 VALUES(:name, :address, :city, :state, :email, :phone, :shipping, NOW(), :complete)");
	$stmt->bindValue(':name', $cleanName, PDO::PARAM_STR);
	$stmt->bindValue(':address', $cleanAddress, PDO::PARAM_STR);
	$stmt->bindValue(':city', $cleanCity, PDO::PARAM_STR);
	$stmt->bindValue(':state', $cleanState, PDO::PARAM_STR);
	$stmt->bindValue(':email', $cleanEmail, PDO::PARAM_STR);
	$stmt->bindValue(':phone', $cleanPhone, PDO::PARAM_STR);
	$stmt->bindValue(':shipping', $cleanShipping, PDO::PARAM_STR);
	$stmt->bindValue(':complete', $complete, PDO::PARAM_INT);

	$stmt->execute();

	//create order_product
	$count = 0;
	foreach( $_SESSION['cart'] as $item){
		$stmt = $DBH->prepare("INSERT INTO order_product(order_id, product_id, quantity) 
								VALUES(:order_id, :product_id, :quantity)");
		$stmt->bindValue(':order_id', 1, PDO::PARAM_INT);
		$stmt->bindValue(':product_id', $count, PDO::PARAM_INT);
		$stmt->bindValue(':quantity', $item[1], PDO::PARAM_INT);
		
		$stmt->execute();
		$count = $count +1;
	}
	
	

?>


<main id="main">
	<div id="cartTable">
		<h2> Total</h2>
		<table>
			<tr>
				<th>Products</th>
				<th>Price</th>
				<th>Quantity</th>
				<th>Line Total</th>
				<th></th>
			</tr>
			<?php
				$total = 0 ;
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
				<td></td>
				<td></td>
				<td>Shipping</td>
				<td>$15.00</td>
				<td></td>
			</tr>
			<tr>
				<td colspan="5"></td>
			</tr>
			<tr>
				<td colspan="2"></td>
				<?php $total = $total + 15 ;?>
				<td>Total</td>
				<td id="total">$<?php echo number_format($total,2); ?></td>
			</tr>
				
		</table>
		<form action="thankyou.php" method="get">
			<input id="inputSubmit" type="submit" value="Complete Order" />
		</form>
	</div>

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

			//$("#total").html("$" + <?php echo number_format($total,2); ?>);
			//total.text('$' + <?php echo number_format($total,2); ?>);
				
		}
	</script>
	

</main>

<?php
	include 'filler/footer.php';
?>