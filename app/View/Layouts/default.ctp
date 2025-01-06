<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        Bicol Isarog
        <?= $this->fetch('title') ?>
    </title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
	

    <?= $this->Html->meta('icon') ?>

 
    <?= $this->Html->css([
		//'font-awesome-all.min', 
		'style',
		'bootstrap/css/bootstrap.min',
		'datatable/datatables.min',
		'util',
		'uploadfile',
		'custom',
		'styles_old',
		'script'	
	]) ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

</head>
<body>
	<?php 
	


	echo $this->element('sidebar'); ?>
    
	 <div class="bodywrp">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 topwrp px-5">
					<h2> <?= $this->fetch('title') ?></h2>
					
					<div>
						<p>Welcome</p>
						<ul class="topbar">
							<li><?php echo $this->Html->image('User 3.png', ['alt' => '']); ?><a href="#" class="dropdown-btn">Administrator</i></i></a>
								<ul class="dropdown-container">
									<li><?php echo $this->Html->image('2 padlock 1.png', ['alt' => '']); ?>
									<?php echo $this->Html->link(
										'Change Password',
										['controller' => 'users', 'action' => 'changepassword'],
										['escape' => false]);
										?>
									</li>
									<li><?php echo $this->Html->image('Out 2.png', ['alt' => '']); ?>
									<?php echo $this->Html->link(
										'Logout',
										['controller' => 'users', 'action' => 'logout'],
										['escape' => false]);
										?>
									</li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<?php echo $this->Flash->render(); ?>
			<div class="employees">				
				<?php echo $this->fetch('content'); ?>
			</div>
		</div>
	</div>
</body>
</html>
<!--script src="https://code.jquery.com/jquery-3.7.1.js"></script-->
<!--script src="https://cdnjs.cloudflare.com/ajax/libs/inputmask/5.0.6/jquery.inputmask.min.js"></script-->

<?= $this->Html->script([
		'jquery/jquery.min',
		'jquery-confirm',
		'bootstrap/js/bootstrap.min',
		'vendors/js/core',
		//'vendors/js/vendor.bundle.base',
		'webroot',
		'inputmask.bundle',
		//'jquery.mask',		
		'vendors/js/core',
		//'vendors/apexcharts/apexcharts.min',
		//'vendors/chartjs/Chart.min',
		//'charts/chartjs.addon',
		//'charts/chartjs',		
		//'chart.min', 
		'common',
	]) ?>


<?= $this->fetch('script') ?>
<?php echo $this->fetch('scriptBottom'); ?>	
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script>
	$(document).ready(function() {
	  $(".dropdown-btn").click(function() {
		$(this).find("#icon").toggleClass("rotate");
		var dropdownContent = $(this).next();
		dropdownContent.slideToggle();
	  });

	  document.addEventListener('DOMContentLoaded', function() {
			flatpickr(".date]", {
				dateFormat: "m-d-Y", // Set the desired format here
				altFormat: "m-d-Y",
				allowInput: true,
			});
		});

	});
</script>
