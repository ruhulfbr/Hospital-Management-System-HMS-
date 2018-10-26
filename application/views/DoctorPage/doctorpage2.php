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
	<script src="<?php echo base_url("js/addInput.js"); ?>" ></script>
	<script src="<?php echo base_url("js/delInput.js"); ?>" ></script>
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
							<a href="<?php echo base_url(); ?>"><button type="button" class="btn btn-danger btn-sm">Logout</button></a>
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
							
								
								
									
							
						</div>
							<!--END OF Patient's Queue-->
							
							<!--Patient's Information-->
							<!--<div class="col-md-1 col-md-push-4">
							<div style="border-left:1px solid #000;height:500px"></div>
							</div>-->
							<div class="row">
								<div class="col-md-12">
								<hr>
									<table class="table table-striped">
										<thead >
											<th>Patient's Name</th>
											<th>Father' Name</th>
											<th>Age</th>
											<th>Gender</th>
											<th>Blood Group</th>
											
											<th>Remarks</th>
										</thead>
										<?php if(isset($records)): ?>
										<?php foreach($records5 as $row): ?>
										<tr>
											<td><?php echo $row->name; ?></td>
											<td><?php echo $row->father_name; ?></td>
											<td><?php echo $row->age; ?></td>
											<td><?php echo $row->gender; ?></td>
											<td><?php echo $row->blood_group; ?></td>
											<td><?php echo $row->remarks; ?></td>
										</tr>
										<?php endforeach; ?>
										<?php endif; ?>
									</table>
								
									<!--<ul class="list-group" style="list-style: none;">
										<li class="list-group-item active">Patient's Name </li>
										<li class="list-group-item"><b>Yogesh Mittal</b> </li>
										<li class="list-group-item-success">&nbsp;&nbsp;Age </li>
										<li class="list-group-item"><b>21yr</b> </li>
										<li class="list-group-item-info">&nbsp;&nbsp;Gender </li>
										<li class="list-group-item"><b>Male</b> </li>
										<li class="list-group-item-danger">&nbsp;&nbsp;Blood Group </li>
										<li class="list-group-item"><b>A+</b> </li>
										<li class="list-group-item-warning">&nbsp;&nbsp;Last Visit </li>
										<li class="list-group-item"><b>Never</b> </li>
										<li class="list-group-item-info">&nbsp;&nbsp;Remarks </li>
										<li class="list-group-item"><b>Sensitive to Sulpha</b> </li>
									</ul>-->
								
								</div>
							</div>
							<!--End of Patient's Information-->
						
						<hr>
						<!-- The prescription Area-->
						<div class="row">
							<?php $attributes3 = array( 'class' => 'form-vertical' ); ?>
							<?php echo form_open('doctor/addPrescription',$attributes3); ?>
							<input type='hidden' name='patid' value='<?php echo $patid; ?>' >
							<input type='hidden' name='regs' value='<?php echo $regs; ?>' >
			<div class="form-group">
				<div class="col-lg-6">
					<label>Prescribed Tests</label>
					<textarea name="tests" id="pres-tests" class="form-control" cols="20" rows="3" placeholder="Prescribed Tests"></textarea>
				</div>
			</div><!-- End form group Tests -->
			<div class="form-group">
				<div class="col-lg-6">
					<label>Diagnosis/Treatment</label>
					<textarea name="diagnosis" id="diagnosis" class="form-control" cols="20" rows="3" placeholder="Diagnosis/Treatment"></textarea>
				</div>
			</div><!-- End form group Diagnosis-->
			</br>
			<div class="row">
				<div class="col-md-12 ">
					<div class="bg-primary" align="center">
						<label>Add Medicine</label>
					</div>
				</div>
			</div>
			<!--Medicine Prescription-->
			<div class="row">
				<div class="col-md-12 ">
					<table  id="tab_logic" class="table-condensed">
						<thead>
							<tr>
								<th class="text-center">From</th>
								<th class="text-center">Unit</th>
								<th class="text-center">Brand</th>
								<th class="text-center">Generic</th>
								<th class="text-center">Sch</th>
								<th class="text-center">Days</th>
								<th class="text-center">Qty</th>
								<th class="text-center">Advise</th>
							</tr>
						</thead>
						<tbody id='parent'>
							<tr>
								<td>
									<select class='form-control' name='fromm[]'>
										<option value='Store'>Store</option>
										<option value='Others'>Others</option>
									</select>
								</td>
								<td>
									<select class='form-control' name='unit[]'>
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
								</td>
								<td><input type='text' class='form-control' placeholder='Brand' size='10' name='brand[]'></td>
								<td><input type='text' class='form-control' placeholder='Generic' size='15' name='generic[]'></td>
								<td>
									<select class='form-control' name='schedule[]'>
										<option value='BIS'>BIS</option>
										<option value='1OD'>1OD</option>
										<option value='3OD'>3OD</option>
										<option value='SOS'>SOS</option>
										<option value='STAT'>STAT</option>
										<option value='BT'>BT</option>
										<option value='DA'>DA</option>
										<option value='OM'>OM</option>
										<option value='ON'>ON</option>
										<option value='OPD'>OPD</option>
										<option value='PO'>PO</option>
										<option value='SA'>SA</option>
										<option value='SUPP'>SUPP</option>
										<option value='QQN'>QQN</option>
										<option value='UD'>UD</option>
									</select>
								</td>
								<td><input type='text' class='form-control' placeholder='Days' size='3' name='days[]'></td>
								<td><input type='text' class='form-control' placeholder='Qty' size='3' name='quantity[]'></td>
								<td>
									<select class='form-control' name='advise[]'>
										<option value='-'>-</option>
										<option value='Before Meal'>Before Meal</option>
										<option value='After Meal'>After Meal</option>
										<option value='With Mea'>With Meal</option>
									</select>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
				<div class="row">
					<div class="col-md-1">
						<input type="button" class="btn btn-success btn-xs" value="Add" onClick="addInput('parent');">
					</div>
					<div class="col-md-1 " >
						<input type="button" class=" btn btn-danger btn-xs" value="Delete" onClick="delInput('parent','child');">
					</div>
					<div class="col-md-1 ">
						<button type="submit" class="btn btn-info btn-xs" >Submit</button>
					</div>
				</div>
				
				

			<?php echo form_close(); ?>
							
							</div>
						
						
						
							
							
							
						
						
						<!--END OF PRESCRIPTION AREA-->
						
						<!--Medical History Area-->
						<hr>
						<div class="row">
						<div class="col-md-12 ">
								<div class="bg-warning" align="center"><label>Medical History</label></div>
							</div>
						</div>
						
						<table class="table table-bordered">
							<tr>
								<th>Date</th>
								<th>Doctor</th>
								<th>Diagnosis/Treatment</th>
							</tr>
							<?php if(isset($records6)): ?>
							<?php foreach($records6 as $row): ?>
							<tr>
								<td><a href='<?php echo base_url("index.php/doctor/prescription/$row->reg"); ?>' target="_blank" ><?php echo $row->date; ?></a></td>
								<td><?php echo $row->doctor; ?></td>
								<td><?php echo $row->diagnosis; ?></td>
							</tr>
							<?php endforeach; ?>
							<?php endif; ?>
						</table>
						</div>
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
	
	<script src="<?php echo base_url("js/save_button.js"); ?>" ></script>
  </body>
</html>