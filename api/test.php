<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<script src="script.js?<?=time()?>"></script>
<html lang="en">
	<body style="background-color: #f9f9f9;">
	<br>
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-default" id="panel-company_info" style="">
					<div class="panel-heading"><strong id="company-name">Company</strong></div>
					<div class="panel-body">
						<form method="post" action="start.php">
							<div class="form-group">
								<label for="token">token</label>
								<input type="token" class="form-control" id="token" placeholder="token" value="eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6IjEifQ.mtEpigIn2lhxtNoo5BygUbPjeWolHTky9anEzYukNRo">
							</div>

							<div class="form-group">
							  <label for="option">option</label>
							  <select class="form-control" id="option">
								<option></option>
								<option value="companies">companies</option>
								<option value="user">user</option>
							  </select>
							</div>
							
							
							<div class="form-group">
							  <label for="task">task</label>
							  <select class="form-control" id="task">
								<option value="select">select</option>
								<option value="insert">insert</option>
								<option value="update">update</option>
								<option value="delete">delete</option>
								<option value="register">register</option>
								<option value="login">login</option>
								<option value="update">update</option>
								
							  </select>
							</div>
							
							<div class="form-group">
								<label for="target">target</label>
								<input type="target" class="form-control" id="target" placeholder="target">
							</div>
							

							
							<button id="submit" class="btn btn-success" type="button">Submit</button>
						</form>
						
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	<div class="container" id="container-companies" style="display:none">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-default" style="">
					<div class="panel-heading"><strong>Update Company</strong></div>
					<div class="panel-body">
							<div class="form-group">
								<label for="name">name</label>
								<input type="name" class="form-control" id="name" placeholder="name">
							</div>
							
							<div class="form-group">
								<label for="address">address</label>
								<input type="address" class="form-control" id="address" placeholder="address">
							</div>

							<div class="form-group">
								<label for="city">city</label>
								<input type="city" class="form-control" id="city" placeholder="city">
							</div>
							
							<div class="form-group">
								<label for="state">state</label>
								<input type="state" class="form-control" id="state" placeholder="state">
							</div>
							
							<div class="form-group">
								<label for="zip">zip</label>
								<input type="zip" class="form-control" id="zip" placeholder="zip">
							</div>
							
							<div class="form-group">
								<label for="country">country</label>
								<input type="country" class="form-control" id="country" placeholder="country">
							</div>
							
							<div class="form-group">
								<label for="timezone">timezone</label>
								<input type="timezone" class="form-control" id="timezone" placeholder="timezone">
							</div>
							
							<div class="form-group">
								<label for="description">description</label>
								<input type="description" class="form-control" id="description" placeholder="description">
							</div>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	
	<div class="container" id="container-user" style="display:none">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-default" style="">
					<div class="panel-heading"><strong>User</strong></div>
					<div class="panel-body">
							<div class="form-group">
								<label for="photo">photo</label>
								<input type="text" class="form-control" id="user_photo" placeholder="photo">
							</div>
							
							<div class="form-group">
								<label for="username">username or email</label>
								<input type="username" class="form-control" id="username" placeholder="username">
							</div>
							
							<div class="form-group">
								<label for="password">password</label>
								<input type="password" class="form-control" id="password" placeholder="password">
							</div>
							
							<div class="form-group">
								<label for="password1">password1</label>
								<input type="password" class="form-control" id="password1" placeholder="password1">
							</div>
							
							<div class="form-group">
								<label for="password2">password2</label>
								<input type="password" class="form-control" id="password2" placeholder="password2">
							</div>
							
							<div class="form-group">
								<label for="email">email</label>
								<input type="email" class="form-control" id="email" placeholder="email">
							</div>
							
							<div class="form-group">
								<label for="first_name">first_name</label>
								<input type="first_name" class="form-control" id="user_first_name" placeholder="first_name">
							</div>
							
							<div class="form-group">
								<label for="middle_name">middle_name</label>
								<input type="middle_name" class="form-control" id="user_middle_name" placeholder="middle_name">
							</div>
							
							<div class="form-group">
								<label for="last_name">last_name</label>
								<input type="last_name" class="form-control" id="user_last_name" placeholder="last_name">
							</div>
							
							<div class="form-group">
								<label for="phone_number">phone_number</label>
								<input type="phone_number" class="form-control" id="user_phone_number" placeholder="phone_number">
							</div>
							
							<div class="form-group">
								<label for="street_address">street_address</label>
								<input type="street_address" class="form-control" id="user_address" placeholder="street_address">
							</div>
							
							<div class="form-group">
								<label for="city">city</label>
								<input type="city" class="form-control" id="user_city" placeholder="city">
							</div>
							
							<div class="form-group">
								<label for="state">state</label>
								<input type="state" class="form-control" id="user_state" placeholder="state">
							</div>
							
							<div class="form-group">
								<label for="zip_code">zip_code</label>
								<input type="zip_code" class="form-control" id="user_zip_code" placeholder="zip_code">
							</div>
							
							<div class="form-group">
								<label for="default_company">default_company</label>
								<input type="default_company" class="form-control" id="user_default_company" placeholder="default_company">
							</div>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	
	<div class="container">
		<div class="row">
			<div class="col-md-4"></div>
			<div class="col-md-4">
				<div class="panel panel-default" style="">
					<div class="panel-heading"><strong>RESULT</strong></div>
					<div class="panel-body">
							<textarea class="form-control" rows="10" id="json" placeholder="json"></textarea>
					</div>
				</div>
			</div>
			<div class="col-md-4"></div>
		</div>
	</div>
	
	</body>
</html>
