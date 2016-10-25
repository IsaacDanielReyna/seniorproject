$(document).ready(function(){
	
	
	$('#menu_companies').addClass('active');
	get_companies();
		
	$('#create').on('click', function () {
		$(this).button('loading')
		send();		
	})
		
	function valid(value)
	{
		if (!(typeof value === "undefined") && value != "" && value != null && value != 0)
			return true;
		else
			return false;
	}
	
	function update_displayed_information(element)
	{
		id = element.attr("company-id");
		name = element.attr("company-name");
		address = element.attr('company-address');
		city = element.attr('company-city');
		state = element.attr('company-state');
		zip = element.attr('company-zip');
		country = element.attr('company-country');
		timezone = element.attr('company-timezone');
		description = element.attr('company-description');
		
		$("#company-name").text(name);
		$("#company_info").empty();
		$("#timezone").empty();
		$("#company_description").empty();
		
		if (valid(address))
			$("#company_info").append(address+'<br>');
		if (valid(city))
			$("#company_info").append(city);
		if (valid(state))
			$("#company_info").append(', ' + state);
		if (valid(zip))
			$("#company_info").append(' ' + zip+'<br>');
		if (valid(country))
			$("#company_info").append(country);
		
		if (valid(timezone))
			$("#timezone").append(timezone);
		if (valid(description))
			$("#company_description").append(description);
	}
	
	
	$(document).on('click', '.close', function(){
		$(this).parent().fadeOut();
	});
	
	$(document).on('click', '.company_item', function(){
		$("#panel-new_company").hide();
		$("#panel-company_info").show();
		$("#panel-employees").show();
		

		id = $(this).attr("company-id");
		name = $(this).attr("company-name");
		address = $(this).attr('company-address');
		city = $(this).attr('company-city');
		state = $(this).attr('company-state');
		zip = $(this).attr('company-zip');
		country = $(this).attr('company-country');
		timezone = $(this).attr('company-timezone');
		description = $(this).attr('company-description');

		update_displayed_information($(this));
		
		$('#edit_company-id').val(id);
		$('#edit_company-name').val(name);
		$('#edit_company-address').val(address);
		$('#edit_company-city').val(city);
		$('#edit_company-state').val(state);
		$('#edit_company-zip').val(zip);
		$('#edit_company-country').val(country);
		$('#edit_company-timezone').val(timezone);
		$('#edit_company-description').val(description);
	});
	
	$(document).on('click', '#default-company', function(){
		$(this).button('loading');
		cid = $(this).attr('value');
		data = { 
			cid:cid
		}
		
		$.ajax({
			type: "POST",
			url: "./set-default-company.php",
			data: data,
			error: function (){
				console.log("error");
			},
			success: function (data){
				json = jQuery.parseJSON(data);
				console.log(data);
				if (json.result == true)
				{

				}
				else
				{
					console.log("error");
				}
				
				$("#alert-default-company-message").empty();
				for (var i=0; i<json.alert.messages.length; i++)
					$("#alert-default-company-message").append(json.alert.messages[i]+'<br>');
				$('#alert-default-company').removeAttr('class').addClass('alert alert-dismissible alert-' + json.alert.type);
				$("#alert-default-company").fadeIn();
				
				$('#default-company').button('reset');
			}
		});
	});
	
	$('#save_company').on('click', function () {
		$(this).button('loading');
		companyid = $('#edit_company-id').val();
		name = $('#edit_company-name').val();
		address = $('#edit_company-address').val();
		city = $('#edit_company-city').val();
		state = $('#edit_company-state').val();
		zip = $('#edit_company-zip').val();
		country = $('#edit_company-country').val();
		timezone = $('#edit_company-timezone').val();
		description = $('#edit_company-description').val();
		
		data = {
			companyid:companyid,
			name:name,
			address:address,
			city:city,
			state:state,
			zip:zip,
			country:country,
			timezone:timezone,
			description:description
		}
		
		$.ajax({
			type: "POST",
			url: "./edit_company.php",
			data: data,
			error: function (){
				console.log("error");
			},
			success: function (data){
				json = jQuery.parseJSON(data);
				console.log(data);
				if (json.result == true)
				{
					$("#company_link-"+companyid).text(name);
					//get_companies();
					//update_displayed_information($("#company_link-"+companyid));
				}
				else
				{
					console.log("error");
				}
				
				$("#alert-message").empty();
				for (var i=0; i<json.alert.messages.length; i++)
					$("#alert-message").append(json.alert.messages[i]+'<br>');
				$('#alert').removeAttr('class').addClass('alert alert-dismissible alert-' + json.alert.type);
				$("#alert").fadeIn();
				
				$('#save_company').button('reset');
			}
		});
	});
		
	function get_companies()
	{		
		token="123456";
		data = {
				token: token
				}
		
		$.ajax( {
			type: "POST",
			url: "./get_companies.php",
			data: data,
			error: function (){
				console.log("error");
			},
			success: function (data){
				json = jQuery.parseJSON(data);
				if (json.result == true)
				{
					if (json.companies.length > 0)
					{
						$('#company_list').empty();
						$('#table-companies tbody').empty();
						first = true;
						for (var i=0; i<json.companies.length; i++)
						{
							id = json.companies[i].id;
							name = json.companies[i].name;
							address = json.companies[i].address;
							city = json.companies[i].city;
							state = json.companies[i].state;
							zip = json.companies[i].zip;
							country = json.companies[i].country;
							timezone = json.companies[i].timezone;
							description = json.companies[i].description;
							status = json.companies[i].status;
							timestamp = json.companies[i].timestamp;
							if (status == 1)
								status = "Active";
							else
								status = "Inactive";
							
							
							dateCreated = new Date(timestamp);
							date = (dateCreated.getMonth()+1) + "/" + dateCreated.getDate() + "/" + dateCreated.getFullYear();
							
							url = '<a id="company_link-'+id+'" href="../company/?company='+id+'" class="list-group-item company_item">'+name+'</a>';
							$("#company_list").append(url);
							$('#company_link-'+id).attr('company-id', id);
							$('#company_link-'+id).attr('company-name', name);
							$('#company_link-'+id).attr('company-address', address);
							$('#company_link-'+id).attr('company-city', city);
							$('#company_link-'+id).attr('company-state', state);
							$('#company_link-'+id).attr('company-zip', zip);
							$('#company_link-'+id).attr('company-country', country);
							$('#company_link-'+id).attr('company-timezone', timezone);
							$('#company_link-'+id).attr('company-description', description);
							
							
							// for table
							default_company = $('#table-companies').attr('default_company');
							if (default_company == id)
								icon = '<span class="glyphicon glyphicon-home" aria-hidden="true"></span>';
							else
								icon = '';
							
							login_button = '<button type="button" class="btn btn-default"><span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>'+status+'</button>';
							$('#table-companies > tbody:last-child').append('<tr><td class="text-right">'+icon+'</td> <td><a href="?company='+id+'">'+name+'</a></td>  <td>'+login_button+'</td></tr>');
						}
					}
				}
				else
					console.log("Error");
			}
		});
	}
	
	function send()
	{
		$("#alert").hide();
		company_name = $("#company_name").val();
		
		
		
		data = {
				company_name: company_name
				}
		
		$.ajax( {
			type: "POST",
			url: "./create_company.php",
			data: data,
			error: function (){
				$(this).removeAttr('disabled');
				$(this).removeAttr('btn-success').addClass('btn-danger');
				$(this).html('ERROR');
				console.log("error");
			},
			success: function (data){
				json = jQuery.parseJSON(data);
				if (json.result == true)
				{
					$("#company_name").val("");
					get_companies();

				}
				else
				{
					$("#alert-message").empty();
					for (var i=0; i<json.alert.messages.length; i++)
						$("#alert-message").append(json.alert.messages[i]+'<br>');
					$('#alert').removeAttr('class').addClass('alert alert-dismissible alert-' + json.alert.type);
					$("#alert").show();					
				}
				$('#create').button('reset');
			}
		});
	}
	
	$('#delete_company').click(function(){
		companyid = $('#edit_company-id').val();
		
		data = {
			companyid:companyid
		}
		
		$.ajax({
			type: "POST",
			url: "./delete_company.php",
			data: data,
			error: function (){
				console.log("error");
			},
			success: function (data){
				json = jQuery.parseJSON(data);
				console.log(data);
				if (json.result == true)
				{
					console.log("successfully deleted");
					get_companies();
					$("#panel-new_company").show();
					$("#panel-company_info").hide();
					$("#panel-employees").hide();
					$("#editcompany").modal('hide');
				}
				else
					console.log("Error");
			}
		});
	});
	$('#myModal').on('show.bs.modal', function (event) {
		/**/
		var button = $(event.relatedTarget) // Button that triggered the modal
		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
		var modal = $(this)
		modal.find('.modal-title').text('Edit: ' + button.data('company'))
		modal.find('#modal-company_name').val(button.data('company'))
		//modal.find('.modal-body input').val(recipient)
		/**/
	})
});