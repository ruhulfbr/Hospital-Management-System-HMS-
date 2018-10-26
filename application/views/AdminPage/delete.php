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
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="nav nav-tabs">
					   <li><a href="<?php echo base_url("index.php/admin/home"); ?>">Dashboard</a></li>
					   <li ><a href="<?php echo base_url("index.php/admin/add"); ?>">Add</a></li>
					   
					   <li class="active"><a href="<?php echo base_url("index.php/admin/delete"); ?>">Delete</a></li>
					   <li><a href="<?php echo base_url("index.php/admin/view"); ?>">View</a></li>
					   <li><a href="<?php echo base_url("index.php/admin/medicine"); ?>">Add Medicine</a></li>
					   <li class="pull-right"><a href="<?php echo base_url('index.php/hms/logout'); ?>"><b>Logout</b></a></li>
					</ul>						
				</div>
			</div>
		
			<h2>Delete User Account</h2>
			<div class="row">
				<div class="col-md-9">
					<table class="table table-striped">
						<thead class="bg-danger">
							<tr>
								<th>User ID</th>
								<th>Name</th>
								<th>Username</th>
								<th>Department</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($records as $row): ?>	
							<tr>
								<td><?php echo $row->user_id; ?></td>
								<td><?php echo $row->name; ?></td>
								<td><?php echo $row->username; ?></td>
								<td><?php echo $row->department; ?></td>
								<td><a href="<?php echo base_url("index.php/admin/deleteUser/$row->username"); ?>"> <button type="button" class="btn btn-xs btn-danger">Delete</button> </a></td>
							</tr>
						<?php endforeach; ?>
						</tbody>
					</table>
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