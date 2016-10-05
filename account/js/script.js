$(document).ready(function(){
	$("#menu_account").addClass("active");
	
	$('#save').on('click', function () {
		$(this).button('loading')
		send();		
	})
	
	function send()
	{
		$("#alert").hide();
		email = $("#email").val();
		pw1 = $("#pw1").val();
		pw2 = $("#pw2").val();
		
		data = {
				email: email,
				pw1: pw1,
				pw2: pw2,
				}
		console.log(data);
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
				$('#save').button('reset');
			}
		});
	}
});