		<div class="user-profile nodisplay ">
          <div class="display-avatar animated-avatar">
          
			 <?php echo $this->html->image('profile/female/image_1.png', ['class' => 'profile-img img-lg rounded-circle']); ?>
					  
		 </div>
          <div class="info-wrapper">
            <p class="user-name">Allen Clerk</p>
            <h6 class="display-income">$3,400,00</h6>
          </div>
        </div>
        <ul class="navigation-menu">
           <li class="nav-category-divider">ADMINISTRATION</li>
          <li>
			<?php echo $this->Html->link(
			'<span class="link-title">Dashboard</span>
              <i class="mdi mdi-home link-icon"></i>',
			['controller' => 'employees', 'action' => 'dashboard'],
			['escape' => false, 'class' => 'default_link']);
			?>
            
          </li>
		  <li>
			<?php echo $this->Html->link(
			'<span class="link-title">HR</span>
              <i class="mdi mdi-account-circle link-icon"></i>',
			['controller' => 'employees', 'action' => 'dashboard'],
			['escape' => false, 'class'=> 'default_link']);
			
			?>
            
          </li>
		  <li class="nodisplay">
			<a href="#"><span class="link-title">CRM</span><i class="mdi mdi-gesture-tap link-icon"></i></a>
          </li>
		  <li class="nodisplay">
			
			<a href="#"><span class="link-title">Accounting</span><i class="mdi mdi-file-chart link-icon"></i></a>
          </li>
		  <li class="nodisplay">
			
            <a href="#"><span class="link-title">Payroll</span><i class="mdi mdi-file-document-edit link-icon"></i></a>
			
			
          </li>
		 
          <li>
			<?php echo $this->Html->link(
			'<span class="link-title">Team Management</span>
              <i class="mdi mdi-account link-icon"></i>',
			['controller' => 'teams', 'action' => 'teammanagement'],
			['escape' => false, 'class' => 'default_link']);
			
			?>
            
          </li>

		  <li>
			<?php echo $this->Html->link(
			'<span class="link-title">RGS HandBook</span>
              <i class="mdi mdi-book-open link-icon"></i>',
			['controller' => 'employees', 'action' => 'handbook'],
			['escape' => false, 'class' => 'default_link']);
			
			?>
            
          </li>
		  
          <li class="nav-category-divider">ACCOUNT</li>
          <li>
			<?php echo $this->Html->link(
			'<span class="link-title">Settings</span>
              <i class="mdi mdi-cogs link-icon"></i>',
			['controller' => 'users', 'action' => 'settings'],
			['escape' => false]);
			
			?>
            
          </li>
		  <li>
			<?php echo $this->Html->link(
			'<span class="link-title">Change Password</span>
              <i class="mdi mdi-lock link-icon"></i>',
			['controller' => 'users', 'action' => 'logout'],
			['escape' => false]);
			
			?>
            
          </li>
		   <li>
			<?php echo $this->Html->link(
			'<span class="link-title">Logout</span>
              <i class="mdi mdi-clock-end link-icon"></i>',
			['controller' => 'users', 'action' => 'logout'],
			['escape' => false]);
			
			?>
            
          </li>
        </ul>
        