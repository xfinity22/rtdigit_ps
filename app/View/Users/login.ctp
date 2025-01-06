<div class="login">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-5 loginwrp">
					<div>
					

						<?php echo $this->Html->image('LOGO 1.png', ['alt' => 'Logo', 'class' => 'sidebar-logo-login']); ?>		
						<h2 class="mt-5">Payroll System Admin Portal</h2>

						<?= $this->Form->create('User', [
							'url' => [
								'controller' => 'users',
								'action' => 'login'
							],
							'class' => 'user',
							'id' => 'default_form'
						]) ?>

						<div class="text-center">
						<?= $this->Flash->render() ?>
						</div>

						<div class="input-container mt-4">
							<i class="far fa-user"></i>
							<?php echo $this->Form->control('username', [
								'placeholder' => 'Username', 
								'label' => false, 
								'maxlength' => 20,
								'class' => 'numbers_and_letters form-control login'
							]); ?>	
							
						</div>
						<div class="input-container mt-3 mb-3">
							
							<i class="fas fa-lock"></i>
						
							<?php echo $this->Form->control('password', [
								'placeholder' => 'Password', 
								'label' => false, 
								'maxlength' => 20,
								'class' => 'form-control login'
								]); ?>
								
						</div>
						

						<?php echo $this->Form->button(__('Login'), [
							'type' => 'submit',
							'class' => 'btn bgcolor'
						]); ?>
				
						<div class="bottomlogo">
							<?php echo $this->Html->image('rgs_logo.png', ['alt' => 'Logo']); ?>							
							<p class="m-t-10">Powered by</p>
						</div>
					</div>
				</div>
				
				<div class="col-md-7 slider">
					<div id="carouselExampleFade" class="carousel slide carousel-fade">
					<div class="carousel-inner">
                    <div class="carousel-item active">
							<div class="img imgslider2">
								<div class="contentwrp">
								<div>
									<h1>Innovation & teawork are <br/> our strongest assets</h1>
									<h3>Let's continue to break barriers & achieve greatness!</h3>
								</div>
								</div>
							</div>
						</div>
						<div class="carousel-item ">
							<div class="img imgslider1">
								<div class="contentwrp">
								<div>
									<h1>Together, we can turn challenges <br/> into opportunities.</h1>
									<h3>let's keep pushing forward and make a difference!</h3>
								</div>
								</div>
							</div>
						</div>
						
						<div class="carousel-item">
							<div class="img imgslider3">
								<div class="contentwrp">
								<div>
									<h1>Your participation in our CSR <br/> event was inspiring</h1>
									<h3>Thanks to you we're not just planting trees-we're <br/> planting hope for a better future!</h3>
								</div>
								</div>
							</div>
						</div>
					</div>
					<div class="btnwrp">
						<div>
							<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
								<span class="carousel-control-prev-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Previous</span>
							</button>
							<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
								<span class="carousel-control-next-icon" aria-hidden="true"></span>
								<span class="visually-hidden">Next</span>
							</button>
						</div>
						<div class="bottomlinks">
							<a href="#">www.rtcodigit.com</a>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div> 
	</div>