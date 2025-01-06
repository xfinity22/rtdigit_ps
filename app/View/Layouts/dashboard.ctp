<?php
	$cakeDescription = __d('cake_dev', 'Payroll System');
	$cakeVersion = __d('cake_dev', 'CakePHP %s', Configure::version())
?>

<html lang=''>
<head>
	<script>
		  $(function() {
			$( "#tabs" ).tabs();
		  });
	</script>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
  

	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css('cake.generic');
		echo $this->Html->css('styles');
		echo $this->Html->css('formdesign');
		echo $this->Html->css('script');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('bootstrap');
		
		echo $this->Html->script('bootstrap.min');
		
		echo $this->Html->script('script3');
		echo $this->Html->script('script1');
		echo $this->Html->script('script2');

		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>
<body>
	<div id="header-wrap">
           <div id="header">
				<div id="menu">
				   <div id="header" style="padding: 5px; font-size: 11px; background-color: green">
						PAYROLL MANAGEMENT SYSTEM
					</div>
					<?php echo $this->element('menu'); ?>
				</div>
			
				<div class="clear"> </div>
             </div>
			
        </div><!-- End of header -->
		
        <div id="container">
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
		</div>
		
	</div>
	<footer style="position: fixed; bottom: 0px; width: 100%; height: 20px; background-color: #ca0003; margin-top: 20px;">
	<?php
		$loguser = $this->requestAction('users/loggeduser');
		$profilec = $this->requestAction('companyprofiles/findprofile/');
		if(!empty($profilec)){ 
			echo '<table cellpadding="0" cellspacing="0" width="100%" style="color: white;">';
				echo '<tr>';
					 echo '<td>'. strtoupper($profilec['Companyprofile']['name']) .'</td>';
					 echo '<td>'. date('F j, Y h:i:s ') .'</td>';
					 echo '<td>Log User: '. $loguser['User']['firstname'] . ' ' . $loguser['User']['lastname'] . ' / ' . $loguser['Usertype']['name'] . '</td>';
				 echo '</tr>';
			echo '</tr>';
		}else{
			echo 'Copyright information';
			
		}
	?>
		
	</footer>
	<?php echo $this->Js->writeBuffer(); ?>
</body>
</html>
