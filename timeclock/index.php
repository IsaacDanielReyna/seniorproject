<?require_once("../scripts/head.php");?>
<?require_once("worksheet.php");?>
<?require_once("punch_menu.php");?>
<script src="./js/script.js?v=<?=time()?>"></script>
<html lang="en">
	<?=navigation_menu()?>
	<div class="container">	
		<?=punch_menu()?>
		<?=worksheet()?>
	</div>
</html>