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
	
  <h2 class="text-center"> Cross-Refer Application </h2>
  <div class="container">
  <div class="row">
  <div class="col-md-10"></div>
  <div class="col-md-1">
  <button type="button" class="btn btn-success btn-xs pull-right" onClick="window.print()"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</button>
  </div>
  <div class="col-md-1">
  <a href="<?php echo base_url('index.php/doctor/home'); ?>" <button type="button" class="btn btn-danger btn-xs pull-right"> Back </button></a>
  </div>
  </div>
	</div>
	</header>
    <div class='container'>
      <div class='row'>
        <div class='col-md-9'>
          <h3>Patient Information</h3>
          <table padding='1px'>
          <?php foreach($patient as $row): ?>
          <tr>
            <td><b>Name:</b> </td>
            <td><?php echo $row->name; ?> </td>
          </tr>
          <tr>
            <td><b>Age:</b> </td>
            <td><?php echo $row->age; ?> </td>
          </tr>
          <tr>
            <td><b>Father's Name: </b> </td>
            <td> <?php echo $row->father_name; ?> </td>
          </tr>
          <tr>
            <td><b>Blood Group:</b> </td>
            <td><?php echo $row->blood_group; ?> </td>
          </tr>
          <tr>
            <td><b>Gender:</b> </td>
            <td><?php echo $row->gender; ?> </td>
          </tr>
          <tr>
            <td><b>Remarks:</b> </td>
            <td><?php echo $row->remarks; ?> </td>
          </tr>
          <?php endforeach; ?>
          <tr>
            
            <td><b>Date:</b> </td>
            <td><?php echo $cref['date']; ?> </td>
          </tr>
          <tr>
            <td><b>Time:</b> </td>
            <td><?php echo $cref['time']; ?> </td>
          </tr>
          </table>
        </div>
      </div>
      <div class='row'>
        
        <hr>
        <div class='col-md-9'>
        <h4>Reffered To: <?php echo $cref['refer_to']; ?></h4>
        <h4>Department: <?php echo $cref['department']; ?></h4>
        <h4>Reason: <?php echo $cref['reason']; ?></h4>
        <h4>Remarks: <?php echo $cref['remarks']; ?></h4>
        </div>
      </div>
    



    </div>
    <footer>
    <div class="container">
    </br></br></br></br></br></br></br>
      <div class="row">
      <div class="col-md-3"><p class="well"><?php echo $doctor; ?></p></div>
      </div>
    </div>
  
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