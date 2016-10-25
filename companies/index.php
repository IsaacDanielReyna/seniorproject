<?require_once("../scripts/head.php");?>
<?require_once("section-company-view.php");?>
<?require_once("section-company-edit.php");?>
<?require_once("section-company-new.php");?>
<?require_once("section-companies.php");?>
<?require_once("section-employees.php");?>
<?require_once("get_company.php");?>
<script src="./js/script.js?v=<?=time()?>"></script>
<html lang="en">
	<div class="container">
		<div class="row">
			<?require_once("../settings_menu/index.php")?>

			<div class="col-md-8">
				<?
					if ($_GET['company'] != "" || $_GET['company'] != null){
					$result = json_decode(get_company($conn, $user, $_GET['company']));
						if ($result->result)
						{
							if ($_GET['task'] == 'edit')
							{
								editcompany($result->company);
							}
							else
							{
								company($result->company);
								employees();
							}

						}else{?>
							<div class="panel panel-default" id="panel-company_info" style="">
								<div class="panel-heading"><strong id="company-name">Company</strong></div>
								<div class="panel-body">
									<?=$result->alert->messages[0]?>
								</div>
							</div>
						<?}
					}else{
						companies($user);
						section_new_company();
					}
				?>
			</div>
		</div>
	</div>
</html>