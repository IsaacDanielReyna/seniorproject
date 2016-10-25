<?require_once("../scripts/head.php");?>
<script src="./js/script.js?v=<?=time()?>"></script>
<html lang="en">
	<div class="container">
		<div class="row">
			<?require_once("../settings_menu/index.php")?>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><strong>Profile</strong></div>
					<div class="panel-body">
						<? if ($_SESSION['alert'] != ''){ ?>
						<div class="alert alert-<?=$_SESSION['alert']->type?>">
							<?
									foreach($_SESSION['alert']->messages as $message)
										echo $message.'<br>';
								$_SESSION['alert'] = '';
							?>
						</div>
						<? } ?>
						<form id="form" method="post" action="update.php" enctype="multipart/form-data">
							<input type="hidden" name="page" value="profile">
							
							<div class="row">
								<div class="col-md-3">
									<a href="#" class="thumbnail">
										<img src="./uploads/<?=$user->photo?>" class="img-rounded" alt="...">
									</a>
								</div>
								
								<div class="col-md-3">
									<div class="form-group">								
										<label for="file_data" class="btn btn-default btn-file">
											<span id="filename">Upload new picture</span>
											<input id="file_data" type="file" name="file_data" style="display: none;">
										</label>
										<p class="help-block">100 KB Max</p>

									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="first_name">First Name</label>
										<input type="text" name="first_name" class="form-control" id="first_name" placeholder="First Name" value="<?=$user->first_name?>">
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="middle_name">Middle Name</label>
										<input type="text" name="middle_name" class="form-control" id="middle_name" placeholder="Middle Name" value="<?=$user->middle_name?>">
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="last_name">Last Name</label>
										<input type="text" name="last_name" class="form-control" id="last_name" placeholder="Last Name" value="<?=$user->last_name?>">
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="phone_number">Phone Number</label>
										<input type="text" name="phone_number" class="form-control" id="phone_number" placeholder="Phone Number" value="<?=$user->phone_number?>">
									</div>
								</div>
							</div>
							
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="street_address">Street Address</label>
										<input type="text" name="street_address" class="form-control" id="street_address" placeholder="Street Address" value="<?=$user->address?>">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label for="city">City</label>
										<input type="text" name="city" class="form-control" id="city" placeholder="City" value="<?=$user->city?>">
									</div>
								</div>
								
								<div class="col-md-3">
									<div class="form-group">
										<label for="state">State</label>
										<input type="text" name="state" class="form-control" id="state" placeholder="State" value="<?=$user->state?>">
									</div>
								</div>
								
								<div class="col-md-2">
									<div class="form-group">
										<label for="zip_code">Zip Code</label>
										<input type="text" name="zip_code" class="form-control" id="zip_code" placeholder="Zip Code" value="<?=$user->zip_code?>">
									</div>
								</div>
							</div>
							<button type="submit" id="//save" data-loading-text="Saving..." class="btn btn-success" autocomplete="off">
							  Save
							</button>

						</form>						
					</div>
				</div>
			</div>
		</div>
	</div>
</html>