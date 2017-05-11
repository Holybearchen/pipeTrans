function submitmodify() {
	var email = document.getElementById("email").value;
	var address = document.getElementById("address").value;
	var pname = document.getElementById("pname").value;
	var phone = document.getElementById("phone").value;
	var idnumber = document.getElementById("idnumber").value;
	
	$.post('/PipeTrans/Seller/Info/modifyinformation', 
		{'email':email, 'address':address, 'pname':pname, 'phone':phone, 'idnumber':idnumber}, 
		function(data) {
			window.location.reload();
		});
}

function undochange() {
	window.location.reload();
}