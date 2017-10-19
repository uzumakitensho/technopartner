// set global moustache tags
Mustache.tags = ['{%', '%}'];

//bootsrap datepicker
$('input.input-date').datepicker({
	format: "dd/mm/yyyy",
	autoclose: true,
	todayHighlight: true
});

function inputDate(){
	$('input.input-date').datepicker({
		format: "dd/mm/yyyy",
		autoclose: true,
		todayHighlight: true
	});
}

// set locale for momment js
moment.locale('id');