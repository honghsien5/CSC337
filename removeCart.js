/*$.each($(".remove"),
	function(i,val){
		console.log(val);
		val.addEventListener('click',removeCartItem(val));
	}
);*/
$(".remove").click(
	
	function(){
	
		removeCartItem($(this));
	}
);

function removeCartItem(element){
	console.log(element);
	$(element).closest('tr').remove();
	$.post(removefromcart.php, 
}

/*
$(".remove").click(
	
	function(){
	
		$(this).closest('tr').remove();
	}
);
*/