<?require_once("../scripts/head.php");?>
<script src="./js/script.js?v=<?=time()?>"></script>
<html lang="en">
	<div class="container">
		<div class="row">
			<?require_once("../settings_menu/index.php")?>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><strong>Account</strong></div>
					
					<div class="panel-body">
						<form id="form">
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="email">Email Address</label>
										<input type="text" class="form-control" id="email" placeholder="Email Address" value="<?=$user->email?>">
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="pw1">Password</label>
										<input type="password" class="form-control" id="pw1" placeholder="*******">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="pw2">Confirm Password</label>
										<input type="password" class="form-control" id="pw2" placeholder="*******">
									</div>
								</div>
							</div>
							<button type="button" id="save" data-loading-text="Saving..." class="btn btn-success" autocomplete="off">
							  Save
							</button>
						</form>						
					</div>
				</div>
			</div>
		</div>
	</div>
</html>