<?require_once("../scripts/head.php");?>
<script src="./js/script.js?v=<?=time()?>"></script>
<html lang="en">
	<div class="container">
		<div class="row">
			<?require_once("../settings_menu/index.php")?>
			<div class="col-md-8">
				<div class="panel panel-default">
					<div class="panel-heading"><strong>Companies</strong></div>
					<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<div class="alert alert-warning">
										<h4>No records</h4>
										<p>No data found matching your query.</p>
										<button class="btn btn-success">New Company</button>
									</div>
									<table class="table">
										<thead>
											<tr>
												<th>Name</th>
											</tr>
										</thead>
										
										<tbody>
											<tr><td>Company 1</td></tr>
											<tr><td>Company 2</td></tr>
											<tr><td>Company 3</td></tr>
											<tr><td>Company 4</td></tr>
											<tr><td>Company 5</td></tr>
										</tbody>
									</table>
								</div>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</html>