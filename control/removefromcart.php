<?php 
	session_start();
	
	if (isset($_POST['product'])) {
		$remove_item = $_POST['product'];
	}
	$remove_item = str_replace(' ', '-', $remove_item);
	
	foreach( $_SESSION['cart'] as $item){
		if(strcmp($item[0],$remove_item)) {
			$target = $item;
		} 
	}
	
	$_SESSION['sum'] = $target[2] * $target[1];
	
	//unset($target);
	unset($target);
				
?>