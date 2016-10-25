$(document).ready(function(){
	
	$(document).on('click', '#submit', function(){
		//$(this).parent().fadeOut();
		send();
	});
	
	$(document).on('click', '#option', function(){
		previous = $(this).val();
	}).on('change', '#option', function(){
		current = $(this).val();
		$("#container-"+previous).slideUp();
		$("#container-"+current).slideDown();
	});
	
	function send()
	{
		$("#alert").hide();
		token = $("#token").val();
		option = $("#option").val();
		task = $("#task").val();
		target = $("#target").val();
		
		data = "nothing";
		if (option == "companies")
		{
			//company stuff
			name = $("#name").val();
			address = $("#address").val();
			city = $("#city").val();
			state = $("#state").val();
			zip = $("#zip").val();
			country = $("#country").val();
			description = $("#description").val();
			
			data = {
					token:token,
					option:option,
					task:task,
					target:target,
					name:name,
					address:address,
					city:city,
					state:state,
					zip:zip,
					country:country,
					description:description
					}
		}
		else if (option == "user")
		{
			//user stuff
			username = $("#username").val();
			password = $("#password").val();
			password1 = $("#password1").val();
			password2 = $("#password2").val();
			email = $("#email").val();
			photo = $("#user_photo").val();
			first_name = $("#user_first_name").val();
			middle_name = $("#user_middle_name").val();
			last_name = $("#user_last_name").val();
			phone_number = $("#user_phone_number").val();
			address = $("#user_address").val();
			city = $("#user_city").val();
			state = $("#user_state").val();
			zip_code = $("#user_zip_code").val();
			default_company = $("#user_default_company").val();
			
			data = {
					token:token,
					option:option,
					task:task,
					target:target,
					username:username,
					email:email,
					password:password,
					password1:password1,
					password2:password2,
					photo:photo,
					first_name:first_name,
					middle_name:middle_name,
					last_name:last_name,
					phone_number:phone_number,
					address:address,
					city:city,
					state:state,
					zip_code:zip_code,
					default_company:default_company
					}
		}
		/**/
		$.ajax( {
			type: "POST",
			url: "start.php",
			data: data,
			error: function (){
				console.log("error");
			},
			success: function (data){
				$("#json").val(data);
				try{
					json = jQuery.parseJSON(data);
					console.log(json);
				}
				catch(err){
					console.log(data);
				}
				
				
			}
		});
		/**/
	}
});