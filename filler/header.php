<!DOCTYPE html>
<!-- Name: Shien Hong -->

<html>
	<head>
		<title>
			<?php echo $title; ?>
		</title>
		<meta charset="UTF-8"/>
		<meta name="description" content=<?php echo $description; ?> />
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<?php //<script src="js/jquery-2.1.0.js"></script>?>
		<script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
		<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
		<script src="js/main.js"></script>
		<script src="js/contentHover.js"></script>
	</head>
	
	<body>
		<h1 id="logo">
			<a href="index.php"><img src="images/logo.png" alt="logo"></a>
		</h1>
		
		<nav>
			<ul>
				<li><a href="products.php">Products</a>
					<ul>
						<li><a href="product.php?product=High-Grade-Strike-Freedom">High Grade Strike Freedom</a></li>
						<li><a href="product.php?product=Real-Grade-Strike-Freedom">Real Grade Strike Freedom</a></li>
						<li><a href="product.php?product=Master-Grade-Strike-Freedom">Master Grade Strike Freedom</a></li>
						<li><a href="product.php?product=Perfect-Grade-Strike-Freedom">Perfect Grade Strike Freedom</a></li>
					</ul>
				</li>
				<li><a href="blog.php">Blog</a></li>
				<li><a href="about.php">About</a></li>
				<li><a href="cart.php">Cart</a></li>
			</ul>
		</nav>