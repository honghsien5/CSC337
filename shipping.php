<!-- Name: Shien Hong --> 

<?php
	$title = " Gundam Model Kit";
	$description = "Gundam Model Kit - Shipping Page";
	include 'filler/header.php';
?>

<main id="main">

	<h2>Shipping Information</h2>
		<div id="shipping">
			<fieldset>
				<legend>Shipping Information</legend>
				 
				
				<form id="shipForm" action="total.php" onsubmit=" return validateForm(this)" name="shipForm" method="post">
						<label for="name">Name</label><input type="text" name="name" id="name"/> <br>
						<label for="address">Address</label>	<input type="text" name="address" id="address"/><br>
						<label for="city">City</label>	<input type="text" name="city" id="city"/><br>
						<label for="state">State</label>	<select name="state" size="1" id="state">
								<option selected value="">State...</option>
								<option value="AZ">Arizona</option>
								<option value="CA">California</option>
								<option value="NY">New York</option>

						</select><br>
						<label for="email">Email</label>	<input type="email" name="email" id="email"><br>
						<label for="phone">Phone</label>	<input type="tel" name="phone" id="phone"><br>
					
				
						
					<div id="inputRadio">
						<input type="radio" name="shippingMethod1" value="default"> Default<br>
						<input type="radio" name="shippingMethod2" value="express"> Express<br>
						<input type="radio" name="shippingMethod3" value="twoDay"> Two Day<br>
					</div>
					
					<input id="shipSub" type="submit" value="Submit" />
				</form>
					
				
					
				
			
			</fieldset>
		</div>
</main>
<?php
	include 'filler/footer.php';
?>