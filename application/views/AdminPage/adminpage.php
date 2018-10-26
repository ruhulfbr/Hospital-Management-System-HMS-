<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hospital Management System: ADMIN</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url("css/bootstrap.min.css"); ?>"  rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->

  </head>
  <body id="admin">
	<header>
		<div class="jumbotron text-center well">
			<h2>The Admin Panel</h2>
			
		</div>
	
	</header>
		<?php 
			$activelogin = 0;
			$registered = 0;
			$regadmin = 0;
			$regdoctor = 0;
			$regreg = 0;
			$regpharmacy =0;
			$acadmin = 0;
			$acdoctor = 0;
			$acreg = 0;
			$acpharmacy =0;
			foreach ($records2 as $row)
			{
				if($row->account_type == 'Admin')
				{
					$regadmin++;
					$registered++;
					if($row->status == 'In')
					{
						$activelogin++;
						$acadmin++;
					}
				}
				elseif($row->account_type == 'Doctor')
				{
					$regdoctor++;
					$registered++;
					if($row->status == 'In')
					{
						$activelogin++;
						$acdoctor++;
					}
				}
				elseif($row->account_type == 'Registration')
				{
					$regreg++;
					$registered++;
					if($row->status == 'In')
					{
						$activelogin++;
						$acreg++;
					}
				}
				else
				{
					$regpharmacy++;
					$registered++;
					if($row->status == 'In')
					{
						$activelogin++;
						$acpharmacy++;
					}
				}
			}

			

		?>


		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-tabs">
					   <li class="active"><a href="<?php echo base_url("index.php/admin/home"); ?>" >Dashboard</a></li>
					   <li><a href="<?php echo base_url("index.php/admin/add"); ?>">Add</a></li>
					   
					   <li><a href="<?php echo base_url("index.php/admin/delete"); ?>">Delete</a></li>
					   <li><a href="<?php echo base_url("index.php/admin/view"); ?>">View</a></li>
					   <li><a href="<?php echo base_url("index.php/admin/medicine"); ?>">Add Medicine</a></li>
					   <li class="pull-right"><a href="<?php echo base_url('index.php/hms/logout'); ?>"><b>Logout</b></a></li>
					</ul>						
				</div>
			</div>	
			</br>
				<div class="row">
					<div class="col-md-4">
						
					</div>
					<div class="col-md-4 well text-success">
						<h2>Active Logins:<?php echo $activelogin; ?></h2>
					</div>
					<div class="col-md-4 ">
						
					</div>
				</div>
				
				<div class="row">
					<div class="col-md-4">
						
					</div>
					<div class="col-md-4 well text-primary">
						<h2>Registered Users:<?php echo $registered; ?> </h2>
					</div>
					<div class="col-md-4 ">
						
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-3 well text-danger">
						<h3>Admin</h3>
					</div>
					<div class="col-xs-3 well text-danger">
						<h3>Doctor</h3>
					</div>
					<div class="col-xs-3 well text-danger">
						<h3>Registration</h3>
					</div>
					<div class="col-xs-3 well text-danger">
						<h3>Pharmacy</h3>
					</div>
				</div>
				
				<div class="row">
					<div class="col-xs-3 well">
						<span class="text-primary"><h4>Registered:&nbsp; <?php echo $regadmin; ?></h4></span>
						<span class="text-success"><h4>Active:&nbsp; <?php echo $acadmin; ?></h4></span>
					</div>
					<div class="col-xs-3 well">
						<span class="text-primary"><h4>Registered:&nbsp; <?php echo $regdoctor; ?></h4></span>
						<span class="text-success"><h4>Active:&nbsp; <?php echo $acdoctor; ?></h4></span>
					</div>
					<div class="col-xs-3 well">
						<span class="text-primary"><h4>Registered:&nbsp; <?php echo $regreg; ?></h4></span>
						<span class="text-success"><h4>Active:&nbsp; <?php echo $acreg; ?></h4></span>
					</div>
					<div class="col-xs-3 well">
						<span class="text-primary"><h4>Registered:&nbsp; <?php echo $regpharmacy; ?></h4></span>
						<span class="text-success"><h4>Active:&nbsp; <?php echo $acpharmacy; ?></h4></span>
					</div>
				</div>
				
				
			
		
		
		
		
		</div>
	


			
		
		
	
		
	<footer>
	<p align="center" style="font-size: 14px; font-weight: bold;">Design & Developed By <a href="http://ruhulamin.cf/" target="_blank"> Md.Ruhul Amin</a></p>
	
	</footer>
	<!--END OF PAGE-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url("js/jquery.min.js"); ?>"  ></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url("js/bootstrap.min.js"); ?>"  ></script>

  </body>
</html>