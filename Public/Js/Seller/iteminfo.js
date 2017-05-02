function additems() {
	var item_name = document.getElementById("item_name").value;
	var item_std = document.getElementById("item_std").value;
	var item_price = document.getElementById("item_price").value;
	var item_quantity = document.getElementById("item_quantity").value;
	var item_intro = document.getElementById("item_intro").value;
	var promise = document.getElementById("promise").value;

	//alert(item_intro);

	$.post('/PipeTrans/Seller/Item/additem', 
		{'name':item_name, 'std':item_std, 'price':item_price, 'quantity':item_quantity, 
			'intro':item_intro, 'promise':promise}, function(data) {
			if (data >= 0)
			{
				alert("success!");
				window.location.reload();
			}
			else
			{
				alert("fail!");
			}
			
		});
}

function modifyitems(itemid) {
	var price = document.getElementById("price").value;
	var quantity = document.getElementById("quantity").value;
	var promise = document.getElementById("promise").value;

	alert(quantity);
	
	$.post('/PipeTrans/Seller/Item/modifyitem', 
		{'itemid':itemid, 'price':price, 'quantity':quantity, 'promise':promise}, function(data) {
			if (data >= 0)
			{
				alert("success!");
				window.location.reload();
			}
			else
			{
				alert("fail!");
			}
			
		});
}