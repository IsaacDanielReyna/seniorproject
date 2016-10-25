<?php function section_new_company(){?>
	<!-- CREATE NEW COMPANY -->
	<div class="panel panel-default" id="panel-new_company">
		<div class="panel-heading"><strong>New Company</strong></div>
		<div class="panel-body">
			<div id="alert" class="alert alert-warning alert-dismissible" role="alert" style="display: none;">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p id="alert-message"><strong>Alert</strong> Message.</p>
			</div>
			
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="company_name">Company Name</label>
							<input type="text" class="form-control" id="company_name" placeholder="Company Name" value="<?=$company->company_name?>">
						</div>
					</div>
				</div>
				<button type="button" id="create" data-loading-text="Creating..." class="btn btn-success" autocomplete="off">
				  Create
				</button>
			
		</div>
	</div>
<?}?>