//Name:Shien Hong


//rotate banner
function rotateBanner(element,source){
	var window = document.getElementById(element);
	$.ajax({
		url:'source.php',
		dataType: 'json',
			//var pictures = $.parseJSON(data);
		success:function(data){
			console.log(data);
			var count= 0;
			setInterval(function() {
				if(count==3){
					count = 0;
				}
				window.src=data[count]['image'];
				count ++;
				
			} ,8000);
		}
	});
}

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


//Form Validation
function validateForm(form){
	var valid = true;
	var error= "";
	//name
	var name=document.forms["shipForm"]["name"].value;
	if( !(/^[A-z ]+$/.test(name))){
		error+="Not a valid name\n";
		valid=false;
	}
	//address
	var address=document.forms["shipForm"]["address"].value;
	if( !(/^[A-z0-9 ]+$/.test(address))){
		error+="Not a valid address\n";
		valid=false;
	}
	//city
	var city=document.forms["shipForm"]["city"].value;
	if( !(/^[A-z]+$/.test(city))){
		error+="Not a valid city\n";
		valid=false;
	}
	//state
	var state=document.forms["shipForm"]["state"].selectedIndex;
	if(state==0){
		error += "State is not selected\n";
		valid=false;
	}
	
	//email
	var email=document.forms["shipForm"]["email"].value;
	var atpos= email.indexOf("@");
	var dotpos= email.lastIndexOf(".");
	if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length)
	{
		error+="Not a valid e-mail address\n";
		valid=false;
	}
	//phone
	var phone=document.forms["shipForm"]["phone"].value;
	if( !(/^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/.test(phone))){
		error+="Not a valid phone address\n";
		valid=false;
	}
	//shipping option
	var shippingMethod1=document.forms["shipForm"]["shippingMethod1"];
	var shippingMethod2=document.forms["shipForm"]["shippingMethod2"];
	var shippingMethod3=document.forms["shipForm"]["shippingMethod3"];
	if(!(shippingMethod1.checked||shippingMethod2.checked||shippingMethod3.checked)){
		
		error+="Shipping Method is not selected\n";
		valid=false;
	}
	
	if(valid==false){
		alert(error);
	}
	return valid;
	
	
}
