<?php
require_once('timezones.php');
function editcompany($company){?>
	<div class="panel panel-default" id="panel-company_info" style="">
		<div class="panel-heading"><strong id="company-name"><a href="?company=<?=$company->id?>"><?=$company->name?></a></strong></div>
		<div class="panel-body">
			<div id="alert" class="alert alert-success alert-dismissible" role="alert" style="display: none;">
				<button type="button" class="close" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p id="alert-message"><strong>Alert</strong> Message.</p>
			</div>
			
			<form id="form" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">						
						<div class="form-group">
							<label for="edit_company-name">Company Name</label>
							<input type="text" class="form-control" id="edit_company-name" placeholder="Company Name" value="<?=$company->name?>">
							<input type="hidden"id="edit_company-id" value="<?=$company->id?>">
						</div>
						
						<div class="form-group">
							<label for="edit_company-address1">Address</label>
							<input type="text" class="form-control" id="edit_company-address" placeholder="Address" value="<?=$company->address?>">
						</div>
					</div>
					
					<div class="col-md-6">
						<div class="form-group">
							<label for="edit_company-city">City</label>
							<input type="text" class="form-control" id="edit_company-city" placeholder="City" value="<?=$company->city?>">
						</div>
					</div>
					<div class="col-md-3">					
						<div class="form-group">
							<label for="edit_company-state">State</label>
							<input type="text" class="form-control" id="edit_company-state" placeholder="State" value="<?=$company->state?>">
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="edit_company-zip">Zip</label>
							<input type="text" class="form-control" id="edit_company-zip" placeholder="Zip" value="<?=$company->zip?>">
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="edit_company-country">Country</label>
							<input type="text" class="form-control" id="edit_company-country" placeholder="Country" value="<?=$company->country?>">
						</div>
						<div class="form-group">
							<label for="edit_company-timezone">Timezone</label>
							<!-- Timezones -->
							<select class="form-control" id="edit_company-timezone">
							<?
								
								$timezones = timezones();
								foreach ($timezones as $timezone)
								{
									$selected = "";
									if ($company->timezone == $timezone->timeZoneId)
										$selected = "selected";
									?><option <?=$selected?> timeZoneId="<?=$timezone->value?>" gmtAdjustment="<?=$timezone->gmtAdjustment?>" useDaylightTime="<?=$timezone->useDaylightTime?>" value="<?=$timezone->timeZoneId?>"><?=$timezone->description?></option><?
								}
							?>
							</select>	
						
						</div>

						<div class="form-group">
						  <label for="edit_company-description">Description</label>
						  <textarea class="form-control" rows="5" id="edit_company-description" placeholder="Description"><?=$company->description?></textarea>
						</div>
					</div>

				</div>
				<button class="btn btn-success" id="save_company" data-loading-text="Saving" type="button">Save</button>
			</form>	
		</div>
	</div>
<?}?>

