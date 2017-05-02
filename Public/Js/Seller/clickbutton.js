function accept(orderid) {

    $.post('/PipeTrans/Seller/Order/acceptOrder', {'orderid':orderid}, function(data) {
    	
    });
}

