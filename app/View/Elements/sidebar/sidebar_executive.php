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
           <li class="nav-category-divider nodisplay">ADMINISTRATION</li>
          <li>
			<?php echo $this->Html->link(
			'<span class="link-title">Overview</span>
              <i class="mdi mdi-account-details link-icon"></i>',
			['controller' => 'employees', 'action' => 'dashboardexecutive'],
			['escape' => false, 'class' => 'default_link']);
			?>
            
          </li>		
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
			'<span class="link-title">Employees</span>
              <i class="mdi mdi-account-group link-icon"></i>',
			['controller' => 'employees', 'action' => 'index'],
			['escape' => false, 'class' => 'default_link']);
			?>
            
          </li>		

		  <li>
			<?php echo $this->Html->link(
			'<span class="link-title">Leaves</span>
              <i class="mdi mdi-calendar link-icon"></i>',
			['controller' => 'leaves', 'action' => 'index'],
			['escape' => false, 'class' => 'default_link']);
			?>
            
          </li>	

		  <li>
			<?php echo $this->Html->link(
			'<span class="link-title">Attendance</span>
              <i class="mdi mdi-account-check link-icon"></i>',
			['controller' => 'attendances', 'action' => 'index'],
			['escape' => false, 'class' => 'default_link']);
			?>
            
          </li>		

		  <li>
			<?php echo $this->Html->link(
			'<span class="link-title">Reports</span>
              <i class="mdi mdi-chart-bar link-icon"></i>',
			['controller' => 'employees', 'action' => 'reports'],
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
		  
          <li class="nav-category-divider nodisplay">ACCOUNT</li>
         
		  <li>
			<?php echo $this->Html->link(
			'<span class="link-title">Change Password</span>
              <i class="mdi mdi-lock link-icon"></i>',
			['controller' => 'users', 'action' => 'changepassword'],
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
        