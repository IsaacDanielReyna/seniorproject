$(document).ready(function(){

	// Prevents Submit
	$( "#login" ).submit(function( event ) {
		$("#alert").hide();
		login();
		$('#alert-message').find('.alert-danger').replaceWith('.alert-success');
		 disabled="disabled"
		$('#submit').attr('disabled', 'disabled');
		event.preventDefault();
	});
	
	function login()
	{
		//$("#login_error").css("visibility", "hidden");
		username = $("#username").val();
		password = $("#password").val();
		
		$.ajax( {
			type: "POST",
			url: "./login.php",
			data: "username=" + username + "&password=" + password,
			success: function (data){
				json = jQuery.parseJSON(data);
				//console.log(json);
				$("#alert-message").text(json.alert.message);
				$('#alert').removeAttr('class').addClass(json.alert.type);
				$("#alert").show();
				if (json.isLogin == 0)
					$('#submit').removeAttr('disabled');
				else
					window.location.replace("../");
			}
		});
	}
});