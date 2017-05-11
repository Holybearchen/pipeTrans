function accept(orderid) {

    $.post('/PipeTrans/Seller/Order/acceptOrder', {'orderid':orderid}, function(data) {
    	if (data > 0)
			{
				alert("success!");
				window.location.href='/PipeTrans/Seller/Order/orderingDetails?orderid=' 
										+ orderid;
			}
			else
			{
				alert("fail!");
				window.location.reload();
			}
    });
}

function refuse(orderid) {
	$.post('/PipeTrans/Seller/Order/refuseOrder', {'orderid':orderid}, function(data) {
    	if (data > 0)
			{
				alert("success!");
				window.location.href='/PipeTrans/Seller/Order/index';
			}
			else
			{
				alert("fail!");
				window.location.reload();
			}
    });
}

function senditems(orderid) {
	var tracknumber = document.getElementById("tracknumber").value;
	var trackcompany = document.getElementById("trackcompany").value;

	$.post('/PipeTrans/Seller/Order/sendItem', 
		{'orderid':orderid, 'tracknumber':tracknumber, 'trackcompany':trackcompany}, 
		function(data) {
    	if (data > 0)
			{
				alert("success!");
				window.location.href='/PipeTrans/Seller/Order/mailingorder?orderid=' 
										+ orderid;
			}
			else
			{
				alert("fail!");
				window.location.reload();
			}
    });
}

