<?
require_once('timezones.php');
function company($company){?>
	<!-- COMPANY INFORMATION -->
	<div class="panel panel-default" id="panel-company_info" style="">
		<div class="panel-heading"><strong id="company-name"><a href="?company=<?=$company->id?>"><?=$company->name?></a></strong></div>
		<div class="panel-body">
			<div id="alert-default-company" class="alert alert-warning alert-dismissible" role="alert" style="display: none;">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p id="alert-default-company-message"><strong>Alert</strong> Message.</p>
			</div>
			<form id="form" method="post" enctype="multipart/form-data">
				<div class="row">
					<div class="col-md-12">																		
						<div class="form-group">
							<label for="address">Address</label>
							<p id="company_info">
							<?
								if ($company->address != null)
										echo $company->address .'<br>';
								
								echo $company->city;
								
								if ($company->city != null && $company->state != null)
									echo ', '. $company->state;
								else
									echo $company->state;
								
								if (($company->state != null || $company->city != null) && $company->zip != null)
									echo ' '. $company->zip;
								else
									echo $company->zip;
								
								if ($company->country != null)
									echo '<br>'.$company->country;
							?>

							</p>
						</div>
						
						<div class="form-group">
							<label for="timezone">Timezone</label>
							<p id="timezone"><?=timezone($company->timezone)?></p>
							
						</div>
						
						<?if ($company->description != null){?>
						<div class="form-group">
						  <label for="company_description">Description</label>
						  <p id="company_description"><?=$company->description?></p>
						</div>
						<?}?>
						
					</div>
				</div>
				<a href="?company=<?=$company->id?>&task=edit" class="btn btn-primary">Edit</a>
				<button type="button" id="default-company" value="<?=$company->id?>" data-loading-text="Setting as default..." class="btn btn-default" autocomplete="off" data-toggle="modal" data-target="#setdefault">
					 <span class="glyphicon glyphicon-home" aria-hidden="true"></span> Set as default
				</button>
			</form>						
		</div>
	</div>
	<!-- END -->
<?}?>