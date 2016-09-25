$(document).ready(function(){
	$( "#file" ).change(function(){
		val = $("#file").val().replace(/C:\\fakepath\\/i, '');
		$("#filename").text(val);
	});
	
	// Prevents Submit
	$( "#form" ).submit(function( event ) {
		$("#alert").hide();
		event.preventDefault();
		send();
	});
	
	function send()
	{
		file = $("#file").val();
		first_name = $("#first_name").val();
		middle_name = $("#middle_name").val();
		last_name = $("#last_name").val();
		phone_number = $("#phone_number").val();
		street_address = $("#street_address").val();
		city = $("#city").val();
		state = $("#state").val();
		zip_code = $("#zip_code").val();
		
		data = {file: file,
				first_name: first_name,
				middle_name: middle_name,
				last_name: last_name,
				phone_number: phone_number,
				street_address: street_address,
				city: city,
				state: state,
				zip_code: zip_code
				}
		
		$.ajax( {
			type: "POST",
			url: "./update.php",
			data: data,
			success: function (data){
				/**
				json = jQuery.parseJSON(data);
				if (json.result == false)
				{
					$("#alert-message").text(json.alert.message);
					$("#alert").show();
				}
				/**/
				console.log(data);
			}
		});
	}
});