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
		username = $("#username").val();
		password = $("#password").val();
		
		$.ajax( {
			type: "POST",
			url: "./login.php",
			data: "username=" + username + "&password=" + password,
			error: function (){
				$('#submit').removeAttr('disabled');
				$('#submit').removeAttr('btn-success').addClass('btn-danger');
				$('#submit').html('ERROR');
			},
			success: function (data){
				json = jQuery.parseJSON(data);
				$("#alert-message").empty();
				for (var i=0; i<json.alert.messages.length; i++)
					$("#alert-message").append(json.alert.messages[i]+'<br>');
				$('#alert').removeAttr('class').addClass('alert alert-dismissible alert-' + json.alert.type);
				$("#alert").show();
				
				if (json.result == false)
					$('#submit').removeAttr('disabled');
				else
					window.location.replace("../");
			}
		});
	}
});