<?require_once("../scripts/head.php");?>

<?php
	if (file_exists('dbconnect.php'))
	{
		echo "System is already installed.";
		require_once("dbconnect.php");
	}
	else
	{
?>
<script src="./js/script.js?v=<?=time()?>"></script>
<html lang="en">
	<body style="background-color: #f9f9f9;">
		<br>
		<div class="container">	
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">Setup and Installation</div>
						<div class="panel-body">
							<div id="alert" class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<p id="alert-message">Incorrect settings</p>
							</div>
							<form id="form">
							  <div class="form-group">
								<label for="database">Database Name</label>
								<input name="database" type="text" class="form-control" id="database" placeholder="Database">
							  </div>
							  
							  <div class="form-group">
								<label for="username">Username</label>
								<input name="username" type="text" class="form-control" id="username" placeholder="Username">
							  </div>
							  
							  <div class="form-group">
								<label for="password">Password</label>
								<input name="password" type="password" class="form-control" id="password" placeholder="Password">
							  </div>
							  
							  <div class="form-group">
								<label for="host">Database Host</label>
								<input name="host" type="text" class="form-control" id="host" placeholder="Host" value="localhost">
							  </div>
							  
							  <div class="form-group">
								<label for="prefix">Table Prefix</label>
								<input name="prefix" type="text" class="form-control" id="prefix" placeholder="Prefix" value="sys_">
							  </div>

							  <button type="submit" id="submit" class="btn btn-default">Next</button>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
	</body>
</html>
	<?}?>