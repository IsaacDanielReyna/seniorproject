$(document).ready(function(){

	// Prevents Submit
	$( "#form" ).submit(function( event ) {
		$("#alert").hide();
		commit();
		$('#alert-message').find('.alert-danger').replaceWith('.alert-success');
		 disabled="disabled"
		$('#submit').attr('disabled', 'disabled');
		event.preventDefault();
	});
	
	function commit()
	{
		//$("#login_error").css("visibility", "hidden");
		username = $("#username").val();
		password1 = $("#password1").val();
		password2 = $("#password2").val();
		email = $("#email").val();
		
		$.ajax( {
			type: "POST",
			url: "./register.php",
			data: "username=" + username + "&password1=" + password1 + "&password2=" + password2 + "&email=" + email,
			success: function (data){
				console.log(data);
				
				json = jQuery.parseJSON(data);
				$("#alert-message").text(json.alert.message);
				$('#alert').removeAttr('class').addClass(json.alert.type);
				$("#alert").show();
				if (json.success)
					window.location.replace("../main");
				else
					$('#submit').removeAttr('disabled');
			}
		});
	}
});