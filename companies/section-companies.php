<?function companies($user){?>
	<div class="panel panel-default" id="panel-companies">
		<div class="panel-heading"><strong>Companies</strong></div>
		<div class="panel-body">
			<!-- COMPANY LIST -->
			<div class="table-responsive">
			  <table class="table" id="table-companies" default_company="<?=$user->default_company?>">
				<thead>
					<tr>
						<th></th><th>Name</th> <th>Status</th>
					</tr>
				</thead>
				<tbody>
				</tbody>
			  </table>
			</div>			
		</div>
	</div>
<?}?>