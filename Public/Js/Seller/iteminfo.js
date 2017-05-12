function deleteitems(itemid) {
	$.post('/PipeTrans/Seller/Item/deleteitem', 
		{'itemid':itemid}, function(data) {
			if (data > 0)
			{
				alert("删除成功!");
				window.location.href='/PipeTrans/Seller/Item/itemIndex';
			}
			else
			{
				alert("删除失败!");
				window.location.reload();
			}
			
		});
}

function modifyitems(itemid) {
	var price = document.getElementById("price").value;
	var quantity = document.getElementById("quantity").value;
	var address = document.getElementById("address").value;
	var itemfreight = document.getElementById("itemfreight").value;
	var promise = document.getElementById("promise").value;
	var newitem = document.getElementById("newitem").value;
	
	$.post('/PipeTrans/Seller/Item/modifyitem', 
		{'itemid':itemid, 'price':price, 'quantity':quantity, 'address':address, 'itemfreight':itemfreight, 'promise':promise,'newitem':newitem}, function(data) {
			if (data >= 0)
			{
				alert("修改成功!");
				window.location.reload();
			}
			else
			{
				alert("修改失败!");
			}	
		});
}

function undoadd() {
	window.location.href='/PipeTrans/Seller/Item/itemIndex';
}