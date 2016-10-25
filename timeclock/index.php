<?require_once("../scripts/head.php");?>
<?require_once("worksheet.php");?>
<?require_once("punch_menu.php");?>
<script src="./js/script.js?v=<?=time()?>"></script>
<html lang="en">
	<div class="container">	
		<div class="row">
			<div class="col-md-12">
				<?=punch_menu()?>
			</div>
		</div>
		
		<div class="row">
			<?=worksheet()?>
		</div>
	</div>
</html>