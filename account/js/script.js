$(document).ready(function(){
	$( "#fileinput" ).change(function(){
		val = $("#fileinput").val().replace(/C:\\fakepath\\/i, '');
		$("#filename").text(val);
	});
	
	// Prevents Submit
	$( "#form" ).submit(function( event ) {
		$("#alert").hide();
		event.preventDefault();
		//test_connection();
	});
	
	function test_connection()
	{
		host = $("#host").val();
		database = $("#database").val();
		username = $("#username").val();
		password = $("#password").val();
		prefix = $("#prefix").val();
		
		$.ajax( {
			type: "POST",
			url: "./validate.php",
			data: "host=" + host + "&database=" + database + "&username=" + username + "&password=" + password + "&prefix=" + prefix,
			success: function (data){
				json = jQuery.parseJSON(data);
				console.log(json);
				if (json.result == false)
				{
					$("#alert-message").text(json.alert.message);
					$("#alert").show();
				}
			}
		});
	}
});