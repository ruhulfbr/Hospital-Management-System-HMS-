<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hospital Management System: Doctor</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url("css/bootstrap.min.css"); ?>"  rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	<link href="<?php echo base_url("css/sidebar_doc_dash.css"); ?>"   rel="stylesheet">
	<link href="<?php echo base_url("css/patient_queue.css"); ?>"   rel="stylesheet">
	<link href="<?php echo base_url("css/save-button.css"); ?>"   rel="stylesheet">
	<link href="<?php echo base_url("css/fixed_doc.css"); ?>"   rel="stylesheet">
  </head>
  <body id="loginpage">
	<header>
	
	
	</header>
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
				<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3" >
					<div class="profile-sidebar">
						<!-- SIDEBAR USERPIC -->
						<div class="profile-userpic">
							<img src="<?php echo $profimage; ?>"  class="img-responsive" alt="">
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
									<a href="#doc-history" data-toggle="modal">
									<i class="glyphicon glyphicon-user"></i>
									History </a>
								</li>
								<!--<li>
									<a href="#doc-reports" data-toggle="modal">
									<i class="glyphicon glyphicon-file"></i>
									Reports </a>
								</li>-->
								<li>
									<a href="#doc-refer" data-toggle="modal">
									<i class="glyphicon glyphicon-random"></i>
									Refer </a>
								</li>
								<li>
									<a href="#doc-refer-cross" data-toggle="modal">
									<i class="glyphicon glyphicon-plane"></i>
									Cross-Refer </a>
								</li>
							</ul>
						</div>
						<!-- END MENU -->
					</div>
				</div>
				<!--THE SIDEBAR ENDS-->
				
				<!--Contents Here-->
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9 ">
					<div class="profile-content">
						
						<!--Main Content Here-->
						<!--Patients Table-->
						<div class="row">
							
								<h4>&nbsp;&nbsp;&nbsp;Patient Queue</h4></br>
								
									<div class="row col-md-12 ">
									<table class="table table-bordered ">
									<thead>
										<tr>
											<th>Registration ID</th>
											<th>Patient ID</th>
											<th>Name</th>
											
											<th class="text-center">Action</th>
											
										</tr>
									</thead>
											<?php if(isset($records2)): ?>
											<?php foreach($records2 as $row): ?>
											<tr>
												<td><?php echo $row->reg; ?></td>
												<td><?php echo $row->pid; ?></td>
												<td><?php echo $row->name; ?></td>
												
												<td class="text-center"><a href="<?php echo base_url("index.php/doctor/select/$row->reg/$row->pid"); ?>" ><span class="glyphicon glyphicon-edit"></span> Select</a> </td>
											</tr>
											<?php endforeach; ?>
											<?php endif; ?>
									</table>
									</div>
								
							
						</div>
							<!--END OF Patient's Queue-->
							
							<!--Patient's Information-->
							<!--<div class="col-md-1 col-md-push-4">
							<div style="border-left:1px solid #000;height:500px"></div>
							</div>-->
							
							<!--End of Patient's Information-->
						
						<hr>
						<!-- The prescription Area-->
						
					</div>
										   
					</div>
				</div>
			
		
		
		<!--MODALS-->
		<!--Medical History Modal-->
		<div class="container">
			<div class="modal fade" id="med-history">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						 <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Doctor:</b> &nbsp; Dr.A.Vishnoi</h4>
							<h4><b>Diagnosis/Treatment:</b> &nbsp; Fever with Cold</h4>
							<h4><b>Tests:</b>&nbsp; None</h4>
							
							
						 </div>
						 <div class="modal-body">
						 
							<table class="table table-bordered">
								<tr>
									<th>Unit</th>
									<th>Brand</th>
									<th>Generic</th>
									<th>Schedule</th>
									<th>Days</th>
									<th>Advise</th>
									
									
								</tr>
								<tr>
									<td>SYP</td>
									<td>MANKIND</td>
									<td>IBUPROFEN 400mg</td>
									<td>1 BD</td>
									<td>x7</td>
									<td>After Meal</td>
								</tr>
							</table>
						 </div>

						 <div class="modal-footer">
							<a href="" class="btn btn-default" data-dismiss="modal">Close</a>
							
						 </div>
					</div>
				</div>
			</div>
		</div>
		<!--End of MEdical History Modal-->
		
		<!--Doctor History Modal-->
		<div class="container">
			<div class="modal fade" id="doc-history">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						 <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Doctor:</b> &nbsp; <?php echo $profname; ?></h4>
							<h4><b><?php echo $profdepartment; ?></b></h4>
							
							
							
						 </div>
						 <div class="modal-body">
							<table class="table table-bordered">
							<tr>
								<th>Date</th>
								<th>Patient</th>
								<th>Patient ID</th>
								<th>Registration ID</th>
								<th>Prescribed Medicine</th>
							</tr>
							<?php if(isset($records3)): ?>
							<?php foreach($records3 as $row): ?>
							<tr>
								<td><?php echo $row->date; ?></td>
								<td><?php echo $row->name; ?></td>
								<td><?php echo $row->pid; ?></td>
								<td><?php echo $row->registration; ?></td>
								<td class="text-center"><a target="_blank" href="<?php echo base_url("index.php/doctor/prescription/$row->registration"); ?>"><button class='btn btn-info btn-xs'> <span class="glyphicon glyphicon-download-alt"></span>View</button></a> </td>
							</tr>
							<?php endforeach; ?>
							<?php endif; ?>
						</table>
						 </div>

						 <div class="modal-footer">
							<a href="" class="btn btn-default" data-dismiss="modal">Close</a>
							
						 </div>
					</div>
				</div>
			</div>
		</div>
		
		<!--Reports Modal-->
		<div class="container">
			<div class="modal fade" id="doc-reports">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						 <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Doctor:</b> &nbsp; Dr. S.K.Singh</h4>
							<h4><b>M.D.Medicine</b></h4>
							<h4><b>Reports</b></h4>
							
							
						 </div>
						 <div class="modal-body">
						<table class="table table-bordered">
							<tr>
								<th>Date</th>
								<th>Patient</th>
								<th>Patient ID</th>
								<th>Prescribed Test</th>
								<th>Report</th>
							</tr>
							<tr>
								<td>8th May, 2015</td>
								<td>Yogesh Mittal</td>
								<td>145236</td>
								<td>Blood Test</td>
								<td class="text-center"><a class='btn btn-info btn-xs' href="#"><span class="glyphicon glyphicon-download-alt"></span>Download PDF</a> </td>
							</tr>
						</table>	
						 </div>

						 <div class="modal-footer">
							<a href="" class="btn btn-default" data-dismiss="modal">Close</a>
							
						 </div>
					</div>
				</div>
			</div>
		</div>
		
		
		<!--Refer Modal-->
		<div class="container">
			<div class="modal fade" id="doc-refer">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						 <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Doctor:</b> &nbsp; <?php echo $profname; ?></h4>
							<h4><b><?php echo $profdepartment; ?></b></h4>
							<h4><b>Refer Section</b></h4>
							
							
						 </div>
						 <div class="modal-body">
							<div class="container">
									<div class="row">
									  <div class="col-md-9 ">
										<div class="well well-sm">
											<?php 
												$attributes = array(
																	'class' => 'form-horizontal'
																	);
											?>
										  <?php echo form_open('doctor/refer',$attributes); ?>
										  
										  <fieldset>
											<legend class="text-center">Referral Form</legend>
									
											
											<div class="form-group">
											  <label class="col-md-3 control-label" for="patientid-refer">Patient ID</label>
											  <div class="col-md-9">
												<input id="name" name="patient-id" type="text" placeholder="Patient ID" class="form-control">
											  </div>
											</div>
											
											<div class="form-group">
											  <label class="col-md-3 control-label" for="regid-refer">Registration ID</label>
											  <div class="col-md-9">
												<input id="name" name="reg-id" type="text" placeholder="Registration ID" class="form-control">
											  </div>
											</div>

											<div class="form-group">
											  
											  <div class="col-md-9">
												<input id="name" name="from-doctor" type="hidden" value="<?php echo $profuserid; ?>" class="form-control">
											  </div>
											</div>
											
											<div class="form-group">
											  <label class="col-md-3 control-label" for="refdoc">Refer to Doctor</label>
											  <div class="col-md-9">
												<select class="form-control" name='refer-doctor'>
													<?php foreach($records4 as $row): ?>
													  <option value="<?php echo $row->user_id; ?>" ><?php echo $row->name; ?></option>
													  
													<?php endforeach; ?> 
												</select>
												
											  </div>
											</div>
									
											
											<div class="form-group">
											  <label class="col-md-3 control-label" for="message">Additional Remarks</label>
											  <div class="col-md-9">
												<textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
											  </div>
											</div>
									
											<!-- Form actions -->
											<div class="form-group">
											  <div class="col-md-12 text-right">
												<button type="submit" class="btn btn-primary btn-lg">Submit</button>
											  </div>
											</div>
										  </fieldset>
										  <?php echo form_close(); ?>
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
		
		
		<!--Cross Refer Modal-->
		<div class="container">
			<div class="modal fade" id="doc-refer-cross">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						 <div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><b>Doctor:</b> &nbsp; <?php echo $profname; ?></h4>
							<h4><b><?php echo $profdepartment; ?></b></h4>
							<h4><b>Cross-Refer Section</b></h4>
							
							
						 </div>
						 <div class="modal-body">
							<div class="container">
									<div class="row">
									  <div class="col-md-9 ">
										<div class="well well-sm">
											<?php
												$attributes2 = array('class' => 'form-horizontal' );
											?>
										  <?php echo form_open('doctor/crossRefer',$attributes2); ?>
										  <fieldset>
											<legend class="text-center">Cross Referral Form</legend>
									
											
											<div class="form-group">
											  <label class="col-md-3 control-label" for="patientid-refer">Patient ID</label>
											  <div class="col-md-9">
												<input id="name" name="patient-id" type="text" placeholder="Patient ID" class="form-control">
											  </div>
											</div>
											
											<div class="form-group">
											  <label class="col-md-3 control-label" for="patientid-refer">Registration ID</label>
											  <div class="col-md-9">
												<input id="name" name="reg-id" type="text" placeholder="Registration ID" class="form-control">
											  </div>
											</div>

											<div class="form-group">
											  
											  <div class="col-md-9">
												<input id="name" name="from-doc" type="hidden" value="<?php echo $profuserid; ?>" class="form-control">
											  </div>
											</div>

											<div class="form-group">
											  
											  <div class="col-md-9">
												<input id="name" name="from-doc-name" type="hidden" value="<?php echo $profname; ?>" class="form-control">
											  </div>
											</div>
											
											<div class="form-group">
											  <label class="col-md-3 control-label" for="email">Refer to Doctor/Hospital</label>
											  <div class="col-md-9">
												<input id="name" name="cross-doc" type="text" placeholder="Doctor/Hospital" class="form-control">
											  </div>
											</div>
											
											<div class="form-group">
											  <label class="col-md-3 control-label" for="refer-dept">Department</label>
											  <div class="col-md-9">
												
													<input id="name" name="refer-doctor-dept" type="text" placeholder="Medicine, Ortho, etc." class="form-control">
												
												
											  </div>
											</div>
									
											
											<div class="form-group">
											  <label class="col-md-3 control-label" for="message">Reasons for Referral</label>
											  <div class="col-md-9">
												<textarea class="form-control" id="message" name="reason" placeholder="Please enter your reasons for referral here..." rows="3"></textarea>
											  </div>
											</div>
											
											<div class="form-group">
											  <label class="col-md-3 control-label" for="message">Additional Remarks</label>
											  <div class="col-md-9">
												<textarea class="form-control" id="message" name="remarks" placeholder="Please enter your message here..." rows="3"></textarea>
											  </div>
											</div>
									
											<!-- Form actions -->
											<div class="form-group">
											  <div class="col-md-12 text-right">
												<button type="submit" class="btn btn-primary btn-lg">Submit</button>
											  </div>
											</div>
										  </fieldset>
										  <?php echo form_close(); ?>
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
		
	<!--Doctor Profile Modal-->
<div class="container">
			<div class="modal fade" id="doc-profile">
				<div class="modal-dialog modal-lg">
					<div class="modal-content">
						 <div class="modal-header">
						 <h2>Edit Profile</h2>
							<button type="button" class="close" data-dismiss="modal">&times;</button>
										
						 </div>
						 <div class="modal-body">
						 	
						 	<?php echo form_open('doctor/profile'); ?>
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
							<?php echo form_open_multipart('doctor/image'); ?>
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
							<?php echo form_open('doctor/password'); ?>
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
	<script src="<?php echo base_url("js/addpatient.js"); ?>" ></script>
	<script src="<?php echo base_url("js/save_button.js"); ?>" ></script>
  </body>
</html>