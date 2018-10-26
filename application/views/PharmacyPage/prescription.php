<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Hospital Management System: Registration</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url("css/bootstrap.min.css"); ?>"  rel="stylesheet" >
    <link href="<?php echo base_url("css/bootstrap.min.css"); ?>"  rel="stylesheet" media="print">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
	<link href="<?php echo base_url("css/sidebar_doc_dash.css"); ?>"  rel="stylesheet" media="all">
	<link href="<?php echo base_url("css/patient_queue.css"); ?>"  rel="stylesheet" media="all" >
	<link href="<?php echo base_url("css/save-button.css"); ?>"  rel="stylesheet" media="all">
	<link href="<?php echo base_url("css/filtertable.css"); ?>"  rel="stylesheet" media="all">
	
  </head>
  <body id="loginpage">
    <?php 

    ?>

	<header>
	     <div class="container">
              <?php if(isset($records4)): ?>
              <?php foreach ($records4 as $row): ?> 
               <?php $test = $row->test; ?>   
              <h4><b>Name:</b> &nbsp; <?php echo $row->name; ?></h4>
              <h4><b>Patient ID:</b>&nbsp; <?php echo $row->pid; ?></h4>
              <h4><b>Registration ID:</b>&nbsp; <?php echo $row->reg; ?></h4>
              <h4><b>Consulting Doctor:</b>&nbsp; Dr. <?php echo $row->doctor; ?></h4>
              <h4><b>Date:</b>&nbsp; <?php echo $row->pdate; ?></h4>
              <h4><b>Diagnosis:</b>&nbsp; <?php echo $row->diagnosis; ?></h4>
              <?php endforeach; ?>
              <?php endif; ?>
	     </div>
	</header>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
                  <table class="table table-bordered">
                    <tr>
                      <th>From </th>
                      <th>Unit </th>
                      <th>Brand </th>
                      <th>Generic </th>
                      <th>Quantity </th>
                      <th>Schedule </th>
                      <th>Days </th>
                      <th>Advise </th>
                      
                      
                    </tr>
                    <?php if (isset($records5)): ?>
                    <?php foreach($records5 as $row): ?>
                    <tr>
                      <td><?php echo $row->fromm; ?></td>
                      <td><?php echo $row->unit; ?></td>
                      <td><?php echo $row->brand; ?></td>
                      <td><?php echo $row->generic; ?></td>
                      <td><?php echo $row->quantity; ?></td>
                      <td><?php echo $row->schedule; ?></td>
                      <td>x<?php echo $row->days; ?></td>
                      <td><?php echo $row->advise; ?></td>
                      
                    </tr>
                    <?php endforeach; ?>
                    <?php endif; ?>
                  
                  </table>
      </div>
      <div class="col-md-3">
                <p class="bg-primary">&nbsp; &nbsp;Tests Prescribed:</p>
                <?php if(isset($test)): ?>
                <p><?php echo $test; ?></p>
                <?php endif; ?> 
      </div>
    </div>
    <div class="row">
      <div class="col-md-2">
        <button type="button" class="btn btn-success" onClick="window.print()"><span class="glyphicon glyphicon-print"></span>&nbsp;Print</button>
      </div>
      <div class="col-md-2">
        <a href="<?php echo base_url('index.php/hms/pharmacy'); ?>" ><button type="button" class="btn btn-danger">Back</button></a>
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
  <script src="<?php echo base_url("js/sidebar_js.js"); ?>" ></script>
  
  <script src="<?php echo base_url("js/filtertable.js"); ?>" ></script>
  
  
  </body>
</html>