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
					   <li class="active"><a href="<?php echo base_url("index.php/admin/add"); ?>">Add</a></li>
					   
					   <li><a href="<?php echo base_url("index.php/admin/delete"); ?>">Delete</a></li>
					   <li><a href="<?php echo base_url("index.php/admin/view"); ?>">View</a></li>
					   <li><a href="<?php echo base_url("index.php/admin/medicine"); ?>">Add Medicine</a></li>
					   <li class="pull-right"><a href="base_url('index.php/hms/logout')"><b>Logout</b></a></li>
					</ul>						
				</div>
			</div>
			<h2>Add User</h2>
			<div class="row">
				<div class="col-md-9">
					<?php
                        $attributes = array('class' => 'form-horizontal', 
                                            'role' => 'form'
                                           );
                    ?>
					<?php echo form_open('admin/add_user',$attributes); ?>
					
					   <div class="form-group">
						  <label for="UserID" class="col-sm-2 control-label">User ID</label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="userid" 
								placeholder="Enter the User ID" name="userid">
						  </div>
					   </div>
					   <div class="form-group">
						  <label for="Name" class="col-sm-2 control-label">Name</label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="name" 
								placeholder="Enter Name" name="name">
						  </div>
					   </div>					   
					   <div class="form-group">
						  <label for="Type" class="col-sm-2 control-label">Type</label>
							  <div class="col-sm-10">
									<select class="form-control" name="type">

										 <option  value="Doctor">Doctor</option>
										 <option  value="Registration">Registration</option>
										 <option  value="Pharmacy">Pharmacy</option>
										 <option  value="Admin" ><span class="text-danger">Admin</span></option>
									</select>
									
							  </div>
					   </div>
					   <div class="form-group">
						  <label for="Department" class="col-sm-2 control-label">Department</label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="department" 
								placeholder="Enter Department" name="department">
						  </div>
					   </div>
					   <div class="form-group">
						  <label for="Email" class="col-sm-2 control-label">E-Mail</label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="email" 
								placeholder="Enter EMail ID" name="email">
						  </div>
					   </div>
					   <div class="form-group">
						  <label for="Phone" class="col-sm-2 control-label">Phone</label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="phone" 
								placeholder="Enter Phone Number" name="phone">
						  </div>
					   </div>
					   <div class="form-group">
						  <label for="Address" class="col-sm-2 control-label">Address</label>
						  <div class="col-sm-10">
							 <textarea name="address" class="form-control" rows="5" placeholder="Enter Address"></textarea>
						  </div>
					   </div>					   

					   <hr>
					   <h2>Login Credentials</h2>
					   <div class="form-group">
						  <label for="username" class="col-sm-2 control-label">Login Username</label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="username" 
								placeholder="Enter the login Username" name="username">
						  </div>
					   </div>
					   <div class="form-group">
						  <label for="password" class="col-sm-2 control-label">Login Password</label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="password" 
								placeholder="Enter the login Password" name="password" value="password" disabled>
						  </div>
					   </div>
					  
					   
					   
					   <div class="form-group">
						  <div class="col-sm-offset-2 col-sm-10">
							 <button type="submit" class="btn btn-success">Create Account</button>
						  </div>
					   </div>
					<?php echo form_close(); ?>				
				</div>
				<div class="col-md-3">
					<?php echo validation_errors('<div class="text-danger">'); ?>
				</div>
			</div>
		
		
		
		
		</div>
	


			
		
		
	
		
	<footer>
	<p align="center" style="font-size: 14px; font-weight: bold;">Design & Developed By <a href="http://ruhulamin.cf/" target="_blank"> Md.Ruhul Amin</a></p>
	
	</footer>
	<!--END OF PAGE-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url("js/jquery.min.js"); ?>" ></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url("js/bootstrap.min.js"); ?>" ></script>



  </body>
</html>