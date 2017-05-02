$(document).ready(function() {
	$("#modify").click(function() {
		$(".preInfo").toggle();
		$(".modifiedInfo").toggle();
		$("#delete").toggle();
		$("#modify").toggle();
		$("#undo").toggle();
		$("#save").toggle();
	});

	$("#undo").click(function() {
		$(".preInfo").toggle();
		$(".modifiedInfo").toggle();
		$("#delete").toggle();
		$("#modify").toggle();
		$("#undo").toggle();
		$("#save").toggle();
	});
});