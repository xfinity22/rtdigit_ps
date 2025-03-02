<div style="margin: 10px;">
	<div class="row">
		<div class="col-lg-12">
            <h1 class="page-header">Dashboard</h1>
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Dashboard
                </li>
            </ol>
        </div>
	</div>
                <!-- /.row -->

	<div class="row">
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-primary">
				<div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-comments fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">26</div>
                            <div>New Employees</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-tasks fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">12</div>
                            <div>PRC Renewal</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-shopping-cart fa-5x"></i>
                        </div>
                        <div class="col-xs-9 text-right">
                            <div class="huge">124</div>
                            <div>End of Contract Employees</div>
                        </div>
                    </div>
                </div>
                <a href="#">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <i class="fa fa-support fa-5x"></i>
                        </div>
                        <div class="col-xs-12 text-right">
                            <div class="huge">13</div>
                            <div>Soon to Expire Driver's Liscense!</div>
                        </div>
                    </div>
                </div>
				<a href="#">
                <div class="panel-footer">
					<span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
                </a>
            </div>
        </div>
    </div>
                <!-- /.row -->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i>New Work Worder</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
				<?php
					if(!empty($added)){
						foreach ($added as $a):
							echo '<a href="/fleetmanagement/maintenances/edit/'.$a['Maintenance']['id'].'" class="list-group-item">';
								echo '<span class="badge">today</span>';
									echo '<i class="fa fa-fw fa-calendar"></i>New Work Order Created for Vehicle '.$a['Vehicle']['platenumber'];
							echo '</a>';
						endforeach;
					echo '</div>';
						echo '<div class="text-right">';
							echo '<a href="#">View All Activity <i class="fa fa-arrow-circle-right"></i></a>';
						echo '</div>';
					
					}
					
					
				?>
                </div>
            </div>
        </div>      
    </div>
	
	
</div>
<br/><br/>