<?function employees(){?>
	<div class="panel panel-default" id="panel-employees" style="//display:none;">
		<div class="panel-heading"><strong>Employees</strong></div>
		<div class="panel-body">
			<!-- EMPLOYEE LIST -->
			<div class="table-responsive">
			  <table class="table">
				<thead>
					<tr>
						<th>Name</th> <th>Status</th>
					</tr>
				</thead>
				<tbody>
					<tr><td>Isaac Reyna</td> <td>Active</td></tr>
					<tr><td>John Smith</td> <td>Pending</td></tr>
					<tr><td>Bill Gates</td> <td>Active</td></tr>
					<tr><td>Isaac Reyna</td> <td>Inactive</td></tr>
					<tr><td>John Smith</td> <td>Pending</td></tr>
					<tr><td>Bill Gates</td> <td>Active</td></tr>					
				</tbody>
			  </table>
			</div>			
			<hr>
			<!-- INVITE EMPLOYEE -->
			<div id="alert-employee" class="alert alert-success alert-dismissible" role="alert" style="//display: none;">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<p id="alert-message-employee"><strong>Alert</strong> Message.</p>
			</div>
			
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label for="employee">Invite Employee</label>
							<input type="text" class="form-control" id="employee" placeholder="Username or Email" value="">
						</div>
					</div>
				</div>
				
				<button type="button" id="invite" data-loading-text="Inviting..." class="btn btn-success" autocomplete="off">
				  Invite
				</button>
		</div>
	</div>
<?}?>