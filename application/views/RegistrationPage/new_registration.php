<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hospital Management System: Registration</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url("css/bootstrap.min.css"); ?>"  rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	<link href="<?php echo base_url("css/sidebar_doc_dash.css"); ?>"  rel="stylesheet">
	<link href="<?php echo base_url("css/patient_queue.css"); ?>"  rel="stylesheet">
	<link href="<?php echo base_url("css/save-button.css"); ?>"  rel="stylesheet">
	<link href="<?php echo base_url("css/filtertable.css"); ?>"  rel="stylesheet">
	
  </head>
  <body id="loginpage">
	<header>
	
	
	</header>
	<!--THE profile information-->
	<?php
		foreach ($records as $row)
		{
			$profname = $row->name;
			$profuserid = $row->user_id;
			$profemail = $row->email;
			$profphone = $row->phone;
			$profaddress = $row->address;
			$profcontent = $row->content;
			$profimage = $row->image;
			$profdepartment = $row->department;
			$profavailability = $row->availability;
			$proftype = $row->type;
			$profusername = $row->username;
		} 
		
	

	?>
	
	<!--THE SIDEBAR-->
			<div class="container">
			<div class="row profile">
				<div class="col-md-3">
					<div class="profile-sidebar">
						<!-- SIDEBAR USERPIC -->
						<div class="profile-userpic">
							<img src="<?php echo $profimage; ?>" class="img-responsive" alt="">
						</div>
						<!-- END SIDEBAR USERPIC -->
						<!-- SIDEBAR USER TITLE -->
						<div class="profile-usertitle">
							<div class="profile-usertitle-name">
								<?php echo $profname; ?>
							</div>
							<div class="profile-usertitle-job">
								<?php echo $profdepartment; ?>
							</div>
						</div>
						<!-- END SIDEBAR USER TITLE -->
						<!-- SIDEBAR BUTTONS -->
						<div class="profile-userbuttons">
							<a href="#doc-profile" data-toggle="modal"><button type="button" class="btn btn-success btn-sm">Profile</button></a>
							<a href="<?php echo base_url('index.php/hms/logout'); ?>"><button type="button" class="btn btn-danger btn-sm">Logout</button></a>
						</div>
						<!-- END SIDEBAR BUTTONS -->
						<!-- SIDEBAR MENU -->
						<div class="profile-usermenu">
							<ul class="nav">
								<li>
									<a href="<?php echo base_url('index.php/registration/home'); ?>">
									<i class="glyphicon glyphicon-user"></i>
									New Registration </a>
								</li>
								<li>
									<a href="<?php echo base_url('index.php/registration/old_patient'); ?>" >
									<i class="glyphicon glyphicon-floppy-disk"></i>
									Old Patient </a>
								</li>
								<li>
									<a href="#reg-history" data-toggle="modal">
									<i class="glyphicon glyphicon-th-list"></i>
									Registrations </a>
								</li>
								<li>
									<a href="#doc-avail" data-toggle="modal">
									<i class="glyphicon glyphicon-plus"></i>
									Doctors </a>
								</li>
							</ul>
						</div>
						<!-- END MENU -->
					</div>
				</div>
				<!--THE SIDEBAR ENDS-->
				
				<!--Contents Here-->
				
				<div class="col-md-9">
					<div class="profile-content">
						
						<!--Main Content Here-->
							
									<h1>Patient Registration</h1>
										<div class="row clearfix">
											
										</div>
										<!--New Patient Registration-->
										<div class="row clearfix">
											<div class="col-md-5 column">
												<div class="page-header">
													<h1>
														<small>New Patient</small>
													</h1>
												</div>
												<?php
												 	$attributes = array('role' => 'form' );

												?>
												<?php echo form_open('registration/new_patient',$attributes); ?>
												
													<div class="form-group">
														
														<?php foreach ($records3 as $r): ?>
														 <?php $p = $r->pid; $p++ ?>
														 <input type="hidden" class="form-control" value="<?php echo $p; ?>" name="patient_id" >
														<?php endforeach; ?>
													</div>
													<div class="form-group">
														<label class="col-md-6">Patient Name:</label>
														 <input type="text" class="form-control" placeholder="Full Name" name="name">
													</div>
													<div class="form-group">
														<label class="col-md-6">Father's Name:</label>
														 <input type="text" class="form-control" placeholder="Father's Name" name="father_name">
													</div>
													<div class="form-group">
														<label class="col-md-6">Age:</label>
														 <input type="text" class="form-control" placeholder="Age" size="3" name="age">
													</div>
													<div class="form-group">
														<label class="col-md-6">Gender:</label>
														 <select class="form-control" name='gender'>
															  <option value="Male">Male</option>
															  <option value="Female">Female</option>
															  <option value="Not Specified">Not Specified</option>
															  
														</select>
													</div>
													<div class="form-group">
														<label class="col-md-6">Blood Group:</label>
														 <select class="form-control" name='blood_group'>
															  <option value='-'>Dont Know</option>
															  <option value="A+">A+</option>
															  <option value="B+">B+</option>
															  <option value="O+">O+</option>
															  <option value="AB+">AB+</option>
															  <option value="A-">A-</option>
															  <option value="B-">B-</option>
															  <option value="O-">O-</option>
															  <option value="AB-">AB-</option>
															  
														</select>
													</div>
													<div class="form-group">
														<label class="col-md-6">Doctor:</label>
														 <select class="form-control" name='doctor'>
															  <?php foreach ($records2 as $row): ?>
															  <option value="<?php echo $row->user_id; ?>"><?php echo $row->name; ?></option>
  															  <?php endforeach; ?>
														</select>
													</div>
													
													<div class="form-group">
														<label class="col-md-6">Remarks:</label>
														 <input type="text" class="form-control" placeholder="Sensitivity, History, etc." name="remarks">
													</div>
													
													
													<button type="submit" class="btn btn-primary">Register</button>
												<?php echo form_close(); ?>
											</div>
											<div class="col-md-6">
												<?php echo validation_errors('<div class="text-danger">'); ?>
											</div>
											
										</div>
									
												

					
					</div>
				</div>
			</div>
		</div>
		
		<!--MODALS-->
		
		
		<!--Registrations Modal-->
		<div class="container">
			<div class="modal fade" id="reg-history">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						 <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Name:</b> &nbsp; <?php echo $profname; ?></h4>
							<h4><b><?php echo $profdepartment; ?></b></h4>
							
							
							
						 </div>
						 <div class="modal-body">
							<div class="container">
														
								<div class="row">
								<div class="col-md-9">
									<div class="panel panel-primary filterable">
										<div class="panel-heading">
											<div class="row"><div class="col-md-4">
											<h3 class="panel-title">Registered Patients</h3></div>
											<div class="col-md-5"></div>
											<div class="col-md-2 ">
												<button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
											</div></div>
										</div>
										<table class="table">
											<thead>
												<tr class="filters">
													<th><input type="text" class="form-control" placeholder="Patient ID" disabled></th>
													<th><input type="text" class="form-control" placeholder="Registration ID" disabled></th>
													<th><input type="text" class="form-control" placeholder="Name" disabled></th>
													<th><input type="text" class="form-control" placeholder="Doctor" disabled></th>
												</tr>
											</thead>
											<tbody>
												<?php if(isset($records5)): ?>
												<?php foreach ($records5 as $row): ?>
												<tr>
													<td><?php echo $row->patient_id; ?></td>
													<td><?php echo $row->registration; ?></td>
													<td><?php echo $row->name; ?></td>
													<td><?php echo $row->doctor; ?></td>
												</tr>
												<?php endforeach; ?>
												<?php endif; ?>
											</tbody>
										</table>
									</div>
									</div>
								</div>
							</div>
						 </div>

						 <div class="modal-footer">
							<a href="" class="btn btn-default" data-dismiss="modal">Close</a>
							
						 </div>
					</div>
				</div>
			</div>
		</div>
		
		<!--Doctors Availability Modal-->
		<div class="container">
			<div class="modal fade" id="doc-avail">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						 <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Name:</b> &nbsp; <?php echo $profname; ?></h4>
							<h4><b><?php echo $profdepartment ?></b></h4>
							
							
							
						 </div>
						 <div class="modal-body">
							<div class="container">
														
								<div class="row">
								<div class="col-md-9">
									<div class="panel panel-primary filterable">
										<div class="panel-heading">
											<div class="row">
												<div class="col-md-4">
											<h3 class="panel-title">Doctors</h3></div>
											<div class="col-md-6"></div>
											<div class="col-md-2">
												<button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span>Filter</button>
											</div>
											</div>
										</div>
										<table class="table">
											<thead>
												<tr class="filters">
													<th><input type="text" class="form-control" placeholder="Department" disabled></th>
													<th><input type="text" class="form-control" placeholder="Name" disabled></th>
													
													<th><input type="text" class="form-control" placeholder="Availability" disabled></th>
												</tr>
											</thead>
											<tbody>
												<?php foreach($records2 as $row): ?>
												<?php
													if($row->availability == 'Available')
													{
														if($row->status == 'In')
														{
															$avail = 'Available';
															$cls = 'success';
														}
														else
														{
															$avail = 'Not Available';
															$cls = 'warning';
														}
													}
													else
													{
														$avail = 'Leave';
														$cls = 'danger';
													}
												?>
												<tr class="<?php echo $cls; ?>">
													<td><?php echo $row->department; ?></td>
													<td><?php echo $row->name; ?></td>
													
													<td><?php echo $avail; ?></td>
												</tr>
												<?php endforeach; ?>
												
											</tbody>
										</table>
									</div>
									</div>
								</div>
							</div>
						 </div>

						 <div class="modal-footer">
							<a href="" class="btn btn-default" data-dismiss="modal">Close</a>
							
						 </div>
					</div>
				</div>
			</div>
		</div>	

	
	<!--Profile Modal-->
		<div class="container">
			<div class="modal fade" id="doc-profile">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						 <div class="modal-header">
						 <h2>Edit Profile</h2>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
										
						 </div>
						 <div class="modal-body">
						 	
						 	<?php echo form_open('registration/profile'); ?>
						 	<input type='hidden' value='<?php echo $profusername; ?>' name='username'>
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
								<label class="col-md-3" for="doc-name">Name:</label>
								<input class="form-control" id="disabledInput" type="text" placeholder="<?php echo $profname; ?>" disabled>
								
								</div>
							</div>	
							</div>
							
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
								<label class="col-md-3" for="doc-email">Email ID:</label>
								<input id="doc-email" name="email" type="text" placeholder="EMail" class="form-control" value="<?php echo $profemail; ?>">
								</div>
							</div>	
							</div>
							
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
								<label class="col-md-3" for="doc-name">Phone:</label>
								<input id="doc-phone" name="phone" type="text" placeholder="Phone Number" class="form-control" value="<?php echo $profphone; ?>">
								</div>
							</div>	
							</div>
							
							<div class="row">
								<div class="col-md-6">
								<label class="col-md-3 control-label" for="address">Address</label>
											  <div class="col-md-9">
												<textarea class="form-control" id="message" name="address" placeholder="Address" rows="3" > <?php echo $profaddress; ?> </textarea>
											  </div>
							</div>	
							</div>
							<div class="row">
								<br>
								<div class="col-md-6">
								<label class="col-md-3 control-label" for="profile">Profile</label>
											  <div class="col-md-9">
												<textarea class="form-control" id="message" name="content" placeholder="Profile" rows="3" > <?php echo $profcontent; ?> </textarea>
											  </div>
								</div>	
							</div>
							<div class='row'>
							<br><br>
							<div class="col-md-2">
							<button type='submit' class="btn btn-success ladda-button" data-style="expand-right">
									<span class="ladda-label"> Update </span>
								</button>
							</div>
							</div>
							<?php echo form_close(); ?>
							<hr>
							<?php echo form_open_multipart('registration/image'); ?>
							<input type='hidden' value='<?php echo $profusername; ?>' name='username'>
							<div class="row">
								<div class="col-md-4">
								<label class="col-md-3 control-label" for="profile">Image</label>
									<div class="profile-userpic">
										<img src="<?php echo $profimage; ?>"  class="img-responsive" alt="">
										
									</div>
								<div class="col-md-4"><?php echo form_upload('userfile'); ?></div>
								</div>	
							</div>
							<br>
							<div class='row'>
							<br><br>
							<div class="col-md-2">
							
							<input type='submit' name='upload' value='Upload' class='btn btn-warning ladda-button'>
							
							</div>
							</div>
							<?php echo form_close(); ?>
							
							<hr>
							<h3>Change Password</h3>
							<hr>
							<?php echo form_open('registration/password'); ?>
							<input type='hidden' value='<?php echo $profusername; ?>' name='username'>
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
								<label class="col-md-6" for="old-password">Old Password</label>
								<input id="old-password" name="old-password" type="password" placeholder="Old Password" class="form-control">
								</div>
							</div>	
							</div>
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
								<label class="col-md-6" for="new-password">New Password</label>
								<input id="new-password" name="new-password" type="password" placeholder="New Password" class="form-control">
								</div>
							</div>	
							</div>
							<div class="row">
								<div class="col-md-6">
								<div class="form-group">
								<label class="col-md-6" for="confirm-new-password">Confirm New Password</label>
								<input id="confirm-new-password" name="confirm-new-password" type="password" placeholder="Confirm New Password" class="form-control">
								</div>
							</div>	
							</div>
							    <button class="btn btn-primary ladda-button" data-style="expand-right" type='submit'>
									<span class="ladda-label"> Update </span>
								</button>
							<?php echo form_close(); ?>
							
						 </div>

						 <div class="modal-footer">
							<a href="" class="btn btn-default" data-dismiss="modal">Close</a>
							
						 </div>
					</div>
				</div>
			</div>
		</div>
			
		
	<!--End of Modals-->
		
		
	<footer>
	<p align="center" style="font-size: 14px; font-weight: bold;">Design & Developed By <a href="http://ruhulamin.cf/" target="_blank"> Md.Ruhul Amin</a></p>
	
	</footer>
	<!--END OF PAGE-->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?php echo base_url("js/jquery.min.js"); ?>" ></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url("js/bootstrap.min.js"); ?>" ></script>
	<script src="<?php echo base_url("js/sidebar_js.js"); ?>" ></script>
	
	<script src="<?php echo base_url("js/filtertable.js"); ?>" ></script>
	
  </body>
</html>