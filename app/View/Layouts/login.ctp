<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
		Bicol Isarog - Payroll System Admin Portal       
    </title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <?= $this->Html->meta('icon') ?>

 
    <?= $this->Html->css([
		//'font-awesome-all.min', 
		'style',
		'bootstrap/css/bootstrap.min',
		'util',
		'custom'	
	]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>
<body>
     
	<?php echo $this->fetch('content'); ?>
</body>
</html>

<?= $this->Html->script([
		//'jquery-3.7.1',
		'bootstrap/js/bootstrap.min',
		'webroot',
		'common'
	]) ?>

<?= $this->fetch('script') ?>
<?php echo $this->fetch('scriptBottom'); ?>	

<script>
	$(document).ready(function() {
	  $(".dropdown-btn").click(function() {
		$(this).find("#icon").toggleClass("rotate");
		var dropdownContent = $(this).next();
		dropdownContent.slideToggle();
	  });
	});
</script>
