<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<script src="./js/script.js?v=<?=time()?>"></script>
<html lang="en">
	<body style="background-color: #f9f9f9;">
	<br>
	<div class="container">	
		<div class="row">
			<div class="col-md-4"></div>

			<div class="col-md-4">
				<img src="../logo.png" class="img-responsive center-block" alt="Responsive image">
				<h3><p class="text-center">Register</p></h3>
				<div id="alert" class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<p id="alert-message">Incorrect username or password.</p>
				</div>
				<div class="panel panel-default">
				  <div class="panel-body">
					<form id="form">
					  <div class="form-group">
						<label for="username">Username</label>
						<input type="username" class="form-control" id="username" placeholder="Username">
					  </div>
					  
					  <div class="form-group">
						<label for="password1">Password</label>
						<input type="password" class="form-control" id="password1" placeholder="Password">
					  </div>
					  
					  <div class="form-group">
						<label for="password2">Confirm Password</label>
						<input type="password" class="form-control" id="password2" placeholder="Confirm Password">
					  </div>
					  
						<div class="form-group">
							<label for="email">Email address</label>
							<input type="email" class="form-control" id="email" placeholder="Email">
						</div>
					  
					  <button id="submit" type="submit" class="btn btn-success btn-block">Sign Up</button>
					</form>
				  </div>
				</div>
			</div>
			
			<div class="col-md-4"></div>
		</div>
	</div>
	</body>
</html>
