function dealwith(complainid) {
	$.post('/PipeTrans/Seller/Complain/dealComplain', 
		{'complainid':complainid}, function(data) {
				window.location.reload();
		});
}