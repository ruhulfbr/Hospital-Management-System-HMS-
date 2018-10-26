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
					   
					   <li><a href="<?php echo base_url("index.php/admin/delete"); ?>">Delete</a></li>
					   <li><a href="<?php echo base_url("index.php/admin/view"); ?>">View</a></li>
					   <li class="active"><a href="<?php echo base_url("index.php/admin/medicine"); ?>">Add Medicine</a></li>
					   <li class="pull-right"><a href="<?php echo base_url('index.php/hms/logout'); ?>"><b>Logout</b></a></li>
					</ul>						
				</div>
			</div>
			<h2>Add Medicine in Inventory</h2>
			<div class="row">
				<div class="col-md-9">
					<?php
                        $attributes = array('class' => 'form-horizontal', 
                                            'role' => 'form'
                                           );
                    ?>
					<?php echo form_open('admin/add_medicine',$attributes); ?>
					   <div class="form-group">
						  <label for="MedicineID" class="col-sm-2 control-label">Medicine ID</label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="medicineid" 
								placeholder="Enter the Medicine ID" name="medicine_id">
						  </div>
					   </div>
					   <div class="form-group">
						  <label for="Type" class="col-sm-2 control-label">Type</label>
							  <div class="col-sm-10">
									<select class="form-control" name="type">

										<option value='TABLET'>TABLET</option>
										<option value='CAPSULE'>CAPSULE</option>
										<option value='SYRUP'>SYRUP</option>
										<option value='TUBE'>TUBE</option>
										<option value='DROP'>DROP</option>
										<option value='INJECTION'>INJECTION</option>
										<option value='LOTION'>LOTION</option>
										<option value='SPRAY'>SPRAY</option>
										<option value='POWDER'>POWDER</option>
									</select>
									
							  </div>
					   </div>
					   <div class="form-group">
						  <label for="Brand" class="col-sm-2 control-label">Brand</label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="brand" 
								placeholder="Enter Brand" name="brand">
						  </div>
					   </div>					   

					   <div class="form-group">
						  <label for="Generic" class="col-sm-2 control-label">Generic</label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="generic" 
								placeholder="Enter Generic" name="generic">
						  </div>
					   </div>
					   <div class="form-group">
						  <label for="Quantity" class="col-sm-2 control-label">Quantity</label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="quantity" 
								placeholder="Enter Quantity" name="quantity">
						  </div>
					   </div>
					   <div class="form-group">
						  <label for="Expiry" class="col-sm-2 control-label">Expiry Date</label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="expiry" 
								placeholder="Enter Expiry Date: YYYY-MM-DD" name="expiry">
						  </div>
					   </div>
					   
					   <div class="form-group">
						  <label for="Store" class="col-sm-2 control-label">Store Number</label>
						  <div class="col-sm-10">
							 <input type="text" class="form-control" id="store" 
								placeholder="Enter Store Number" name="store">
						  </div>
					   </div>

					   
					   
					   <div class="form-group">
						  <div class="col-sm-offset-2 col-sm-10">
							 <button type="submit" class="btn btn-warning">Add Medicine</button>
						  </div>
					   </div>
					<?php echo form_close(); ?>	

				</div>
				<div class="col-md-3">
					<?php echo validation_errors('<div class="text-danger"> '); ?>
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