<!DOCTYPE html>
<html>
<head>
	<?php include '../wp-content/plugins/ArchwayApp/media/include/head.php' ;?>
</head>
<body>
<div class="container">
	<!-- Header -->
	<div class="page-header">
		<h1><i class="text-muted fa fa-database"></i> SOWEGA CASA <small>Resource Database</small></h1>
		<a href="resource.php"><button class="btn btn-success">View Resource Directory</button></a>
	</div>
	<!-- /.Header -->
	<h3>Add a New Resource</h3>
	<!-- Form -->
	<form class="form-horizontal col-md-6" role="form">
		<!-- Name -->
		<div class="form-group">
			<label class="col-sm-3 control-label">Name</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="name">
			</div>
		</div>
		<!-- /.Name -->
		<!-- Address -->
		<div class="form-group">
			<label class="col-sm-3 control-label">Address</label>
			<div class="col-sm-7" style="padding-bottom: 10px;">
				<!-- Street 1 -->
				<input type="text" class="form-control" id="street1" placeholder="Street 1">
			</div>
			<div class="col-sm-3"></div>
			<div class="col-sm-7" style="padding-bottom: 10px;">
				<!-- Street 2 -->
				<input type="text" class="form-control" id="street1" placeholder="Street 2">
			</div>
			<div class="col-sm-3"></div>
			<div class="col-sm-4" style="padding-bottom: 10px;">
				<!-- City -->
				<input type="text" class="form-control" id="city" placeholder="City">
			</div>
			<div class="col-sm-3">
				<!-- ZipCode -->
				<input type="number" class="form-control" id="zip" placeholder="Zip Code">
			</div>
		</div>
		<!-- /.Address -->
		<!-- Program Type -->
		<div class="form-group">
			<label class="col-sm-3 control-label">Program Type</label>
			<div class="col-sm-7">
				<select class="form-control">
					<option value="" selected readonly disabled>Select a Program Type</option>
					<?php
						include "media/sql_functions/connectdb.php" ;

						$sql="SELECT * FROM programType ORDER BY programType";
						$result=mysql_query($sql);

						while($row = mysql_fetch_array($result)) {
							$id = $row['ID'];
							$name = $row['programType'];
							echo "<option value=\"$id\">$name</option>";
						}
						mysql_close($link);
					?>
				</select>
			</div>
	  	</div>
	  	<!-- /.Program Type -->
	  	<!-- Website -->
		<div class="form-group">
			<label class="col-sm-3 control-label">Website</label>
			<div class="col-sm-7">
				<input type="url" class="form-control" id="website">
			</div>
		</div>
		<!-- /.Website -->
		<!-- Purpose -->
		<div class="form-group">
			<label class="col-sm-3 control-label">Purpose</label>
			<div class="col-sm-7">
				<textarea rows="4" class="form-control" id="purpose"></textarea>
			</div>
		</div>
		<!-- /.Purpose -->
		<!-- Mission -->
		<div class="form-group">
			<label class="col-sm-3 control-label">Mission</label>
			<div class="col-sm-7">
				<textarea rows="4" class="form-control" id="mission"></textarea>
			</div>
		</div>
		<!-- /.Mission -->
		<!-- Description -->
		<div class="form-group">
			<label class="col-sm-3 control-label">Description</label>
			<div class="col-sm-7">
				<textarea rows="4" class="form-control" id="description"></textarea>
			</div>
		</div>
		<!-- /.Description -->
		<!-- Eligibility -->
		<div class="form-group">
			<label class="col-sm-3 control-label">Eligibility</label>
			<div class="col-sm-7">
				<textarea rows="4" class="form-control" id="eligibility"></textarea>
			</div>
		</div>
		<!-- /.Eligibility -->
		<!-- Fees -->
		<div class="form-group">
			<label class="col-sm-3 control-label">Fees</label>
			<div class="col-sm-7">
				<textarea rows="4" class="form-control" id="fees"></textarea>
			</div>
		</div>
		<!-- /.Fees -->
		<!-- Contact Person -->
		<div class="contact">
			<h4>Contact</h4>
			<div class="form-group contact_0">
				<label class="col-sm-3 control-label">Contact 1</label>
				<div class="col-sm-3" style="padding-bottom: 10px;">
					<!-- First Name -->
					<input type="text" class="form-control" name="firstName_0" placeholder="First Name">
				</div>
				<div class="col-sm-4" style="padding-bottom: 10px;">
					<!-- Last Name -->
					<input type="number" class="form-control" name="lastName_0" placeholder="Last Name">
				</div>
				<div class="col-sm-3"></div>
				<div class="col-sm-7">
					<!-- Title -->
					<input type="text" class="form-control" name="title_0" placeholder="Title">
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-7">
				<!-- Add Contact button -->
				<button id="add-contact" class="btn btn-info"><i class="fa fa-plus"> New Contact</i></button>
			</div>
		</div>
		<!-- /.Contact Person -->
		<!-- Contact Number -->
		<div class="number">
			<h4>Contact Number(s)</h4>
			<div class="form-group number_0">
				<label class="col-sm-3 control-label">Number 1</label>
				<div class="col-sm-7" style="padding-bottom: 10px;">
					<!-- Number -->
					<input type="text" class="form-control" name="number_0" placeholder="Number">
				</div>
				<div class="col-sm-3"></div>
				<div class="col-sm-7">
					<!-- Description -->
					<input type="text" class="form-control" name="description_0" placeholder="Description (i.e Emergency Hotline)">
				</div>
			</div>
	  	</div>
		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-7">
				<!-- Add Number button -->
				<button id="add-number" class="btn btn-info"><i class="fa fa-plus"> New Number</i></button>
			</div>
		</div>
		<!-- /.Contact Number -->
		<!-- Keywords -->
		<div class="form-group">
			<label class="col-sm-3 control-label">Keywords</label>
			<div class="col-sm-7">
				<input type="text" class="form-control" id="keywords" placeholder="Type in Keyword tags">
			</div>
		</div>
		<!-- /.Keywords -->
		<!-- Service Areas -->
		<div class="form-group">
			<label class="col-sm-3 control-label">Service Area(s)</label>
			<div class="col-sm-7">
				<select class="form-control" id="serviceArea" multiple="multiple">
					<option value="" readonly disabled>Select Service Areas</option>
					<?php
						include "media/sql_functions/connectdb.php" ;

						$sql="SELECT * FROM serviceArea ORDER BY serviceArea";
						$result=mysql_query($sql);

						while($row = mysql_fetch_array($result)) {
							$id = $row['ID'];
							$name = $row['serviceArea'];
							echo "<option value=\"$id\">$name</option>";
						}
						mysql_close($link);
					?>
				</select>
			</div>
		</div>
		<!-- /.Service Areas -->
		<!-- Operation -->
		<div class="operation">
			<h4>Operation</h4>
			<!-- recurrence -->
			<div class="form-group">
				<label class="col-sm-3 control-label">Recurrence</label>
				<div class="col-sm-7">
					<select class="form-control" name="recurrence">
						<option value="" selected="selected" readonly disabled>Select Recurrence</option>
						<?php
							include "media/sql_functions/connectdb.php" ;

							$sql="SELECT * FROM monthRecurrence ORDER BY ID";
							$result=mysql_query($sql);

							while($row = mysql_fetch_array($result)) {
								$id = $row['ID'];
								$name = $row['recurrence'];
								echo "<option value=\"$id\">$name</option>";
							}
							mysql_close($link);
						?>
					</select>
				</div>
			</div>
			<!--- open holidays? -->
			<div class="form-group">
				<label class="col-sm-3 control-label">Open Holidays?</label>
				<div class="col-sm-7">
					<label class="radio-inline">
						<input type="radio" name="yes" value="1"> Yes
					</label>
					<label class="radio-inline">
						<input type="radio" name="no" value="0"> No
					</label>
				</div>	
			</div>
			<!--- notes -->
			<div class="form-group">
				<label class="col-sm-3 control-label">Notes</label>
				<div class="col-sm-7">
					<textarea rows="2" class="form-control" id="notes"></textarea>
				</div>
			</div>
			<!--- hours -->
			<div class="form-group operation_1">
				<!--- days of week -->
				<label class="col-sm-2 control-label">Day(s) of Week</label>
				<div class="col-sm-10" style="padding-bottom: 10px;" name="daysOfWeek_0">
					<?php
						include "media/sql_functions/connectdb.php" ;

						$sql="SELECT * FROM dayOfWeek WHERE ID > 0 AND ID < 6 ORDER BY ID";
						$result=mysql_query($sql);

						while($row = mysql_fetch_array($result)) {
							$id = $row['ID'];
							$name = $row['dayOfWeek'];
							echo "<label class=\"checkbox-inline\"><input type=\"checkbox\" id=\"$id\" value=\"$id\"> $name</label>";
						}
						echo "<br>";

						$sql1="SELECT * FROM dayOfWeek WHERE ID < 1 OR ID > 5 ORDER BY ID";
						$result1=mysql_query($sql1);

						while($row1 = mysql_fetch_array($result1)) {
							$id = $row1['ID'];
							$name = $row1['dayOfWeek'];
							echo "<label class=\"checkbox-inline\"><input type=\"checkbox\" id=\"$id\" value=\"$id\"> $name</label>";
						}
						mysql_close($link);
					?>
				</div>
				<!--- start time -->
				<label class="col-sm-3 control-label">Start time</label>
				<div class="col-sm-7" style="padding-bottom: 10px;">
					<select class="form-control" style="width: 50px !important; display: inline !important;">
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08" selected="selected">08</option>
						<option value="09">09</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
					</select> : 
					<select class="form-control" style="width: 50px !important; display: inline !important;">
						<option value="00">00</option>
						<option value="00">15</option>
						<option value="00">30</option>
						<option value="00">45</option>
					</select>
					<label class="radio-inline" style="margin-left: 10px !important; margin-top: -5px !important;">
						<input type="radio" name="am_0_a" value="am" checked="checked"> AM
					</label>
					<label class="radio-inline" style="margin-top: -5px !important;">
						<input type="radio" name="pm_0_a" value="pm"> PM
					</label>
				</div>
				<!--- end time -->
				<label class="col-sm-3 control-label">End time</label>
				<div class="col-sm-7">
					<select class="form-control" style="width: 50px !important; display: inline !important;">
						<option value="01">01</option>
						<option value="02">02</option>
						<option value="03">03</option>
						<option value="04">04</option>
						<option value="05" selected="selected">05</option>
						<option value="06">06</option>
						<option value="07">07</option>
						<option value="08">08</option>
						<option value="09">09</option>
						<option value="10">10</option>
						<option value="11">11</option>
						<option value="12">12</option>
					</select> : 
					<select class="form-control" style="width: 50px !important; display: inline !important;">
						<option value="00">00</option>
						<option value="15">15</option>
						<option value="30">30</option>
						<option value="45">45</option>
					</select>
					<label class="radio-inline" style="margin-left: 10px !important; margin-top: -5px !important;">
						<input type="radio" name="am_0_b" value="am"> AM
					</label>
					<label class="radio-inline" style="margin-top: -5px !important;">
						<input type="radio" name="pm_0_b" value="pm" checked="checked"> PM
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-3"></div>
			<div class="col-sm-7">
				<!-- Add Hours button -->
				<button id="add-hours" class="btn btn-info"><i class="fa fa-plus"> Hours</i></button>
			</div>
		</div>
		<!--Submit button-->
		<div class="form-group">
	    	<div class="col-sm-offset-2 col-sm-10">
	     		<button type="submit" class="btn btn-success pull-right">Submit</button>
	    	</div>
	  	</div>
	</form>
</div>
</body>
<script>
	$('#keywords').tokenfield();

	$(document).ready(function() {
		$('#serviceArea').multiselect({
            enableFiltering: true
        });

	    var i = 0; //initlal text box count
	    $("#add-contact").click(function(e){ //on add input button click
	        e.preventDefault();
			$(".remove_contact").remove();
	        i++; //text box increment
	        $(".contact").append('<div class="form-group contact_' + (i+1) + '"><label class="col-sm-3 control-label">Contact ' + (i + 1) + '</label><div class="col-sm-3" style="padding-bottom: 10px;"><input type="text" class="form-control" name="firstName_' + i + '" placeholder="First Name"></div><div class="col-sm-4" style="padding-bottom: 10px;"><input type="number" class="form-control" name="lastName_' + i + '" placeholder="Last Name"></div><div class="col-sm-3"></div><div class="col-sm-7" style="padding-bottom: 10px;"><input type="text" class="form-control" name="title_' + i + '" placeholder="Title"></div><a href="#" class="remove_contact"><button class="btn btn-danger"><i class="fa fa-minus"></i></button></a></div>'); //add input box
	 
	    });
	    
	    $(".contact").on("click",".remove_contact", function(e){ //user click on remove text
	        e.preventDefault(); $(this).parent('div').remove(); i--;
	        if (i != 0) {
	        	$('.contact_' + (i+1)).append('<a href="#" class="remove_contact"><button class="btn btn-danger"><i class="fa fa-minus"></i></button></a>');
	    	}
	    });

	    var x = 0;
	    $("#add-number").click(function(e){ //on add input button click
	        e.preventDefault();
			$(".remove_number").remove();
	        x++; //text box increment
	        $(".number").append('<div class="form-group number_' + (x+1) + '"><label class="col-sm-3 control-label">Number ' + (x+1) + '</label><div class="col-sm-7" style="padding-bottom: 10px;"><input type="text" class="form-control" name="number_' + x + '" placeholder="Number"></div><div class="col-sm-3"></div><div class="col-sm-7"><input type="text" class="form-control" name="description_' + x + '" placeholder="Description"></div><a href="#" class="remove_number"><button class="btn btn-danger"><i class="fa fa-minus"></i></button></a></div>'); //add input box
	 
	    });
	    
	    $(".number").on("click",".remove_number", function(e){ //user click on remove text
	        e.preventDefault(); $(this).parent('div').remove(); x--;
	        if (x != 0) {
	        	$('.number_' + (x+1)).append('<a href="#" class="remove_number"><button class="btn btn-danger"><i class="fa fa-minus"></i></button></a>');
	    	}
	    })

	    var h = 0;
	    $("#add-hours").click(function(e){ //on add input button click
	        e.preventDefault();
			$(".remove_hour").remove();
	        h++; //text box increment
	        var divHour = '<div class="form-group operation_' + (h+1) + '">' +
				'<!--- days of week -->' +
				'<label class="col-sm-2 control-label">Day(s) of Week</label>' +
				'<div class="col-sm-10" style="padding-bottom: 10px;" name="daysOfWeek_' + h + '">';
					<?php
						include "media/sql_functions/connectdb.php" ;

						$sql="SELECT * FROM dayOfWeek WHERE ID > 0 AND ID < 6 ORDER BY ID";
						$result=mysql_query($sql);

						while($row = mysql_fetch_array($result)) {
							$id = $row['ID'];
							$name = $row['dayOfWeek'];
							echo"divHour += '<label class=\"checkbox-inline\"><input type=\"checkbox\" value=\"$id\"> $name</label>';";
						}
						echo"divHour += '<br>';";

						$sql1="SELECT * FROM dayOfWeek WHERE ID < 1 OR ID > 5 ORDER BY ID";
						$result1=mysql_query($sql1);

						while($row1 = mysql_fetch_array($result1)) {
							$id = $row1['ID'];
							$name = $row1['dayOfWeek'];
							echo"divHour += '<label class=\"checkbox-inline\"><input type=\"checkbox\" value=\"$id\"> $name</label>';";
						}
						mysql_close($link);
					?>
				divHour += '</div>' +
				'<!--- start time -->' +
				'<label class="col-sm-3 control-label">Start time</label>' +
				'<div class="col-sm-7" style="padding-bottom: 10px;">' +
					'<select class="form-control" style="width: 50px !important; display: inline !important;">' +
						'<option value="01">01</option>' +
						'<option value="02">02</option>' +
						'<option value="03">03</option>' +
						'<option value="04">04</option>' +
						'<option value="05">05</option>' +
						'<option value="06">06</option>' +
						'<option value="07">07</option>' +
						'<option value="08" selected="selected">08</option>' +
						'<option value="09">09</option>' +
						'<option value="10">10</option>' +
						'<option value="11">11</option>' +
						'<option value="12">12</option>' +
					'</select> : ' +
					'<select class="form-control" style="width: 50px !important; display: inline !important;">' +
						'<option value="00">00</option>' +
						'<option value="00">15</option>' +
						'<option value="00">30</option>' +
						'<option value="00">45</option>' +
					'</select>' +
					'<label class="radio-inline" style="margin-left: 10px !important; margin-top: -5px !important;">' +
						'<input type="radio" name="am_' + h + '_a" value="am" checked="checked"> AM' +
					'</label>' +
					'<label class="radio-inline" style="margin-top: -5px !important;">' +
						'<input type="radio" name="pm_' + h + '_a" value="pm"> PM' +
					'</label>' +
				'</div>' +
				'<!--- end time -->' +
				'<label class="col-sm-3 control-label">End time</label>' +
				'<div class="col-sm-7">' +
					'<select class="form-control" style="width: 50px !important; display: inline !important;">' +
						'<option value="01">01</option>' +
						'<option value="02">02</option>' +
						'<option value="03">03</option>' +
						'<option value="04">04</option>' +
						'<option value="05" selected="selected">05</option>' +
						'<option value="06">06</option>' +
						'<option value="07">07</option>' +
						'<option value="08">08</option>' +
						'<option value="09">09</option>' +
						'<option value="10">10</option>' +
						'<option value="11">11</option>' +
						'<option value="12">12</option>' +
					'</select> : ' +
					'<select class="form-control" style="width: 50px !important; display: inline !important;">' +
						'<option value="00">00</option>' +
						'<option value="00">15</option>' +
						'<option value="00">30</option>' +
						'<option value="00">45</option>' +
					'</select>' +
					'<label class="radio-inline" style="margin-left: 10px !important; margin-top: -5px !important;">' +
						'<input type="radio" name="am_' + h + '_b" value="am"> AM' +
					'</label>' +
					'<label class="radio-inline" style="margin-top: -5px !important;">' +
						'<input type="radio" name="pm_' + h + '_b" value="pm" checked="checked"> PM' +
					'</label>' +
				'</div>' +
		'<a href="#" class="remove_hour"><button class="btn btn-danger"><i class="fa fa-minus"></i></button></a></div>'; //add input box
	 	$(".operation").append(divHour);
	    });
	    
	    $(".operation").on("click",".remove_hour", function(e){ //user click on remove text
	        e.preventDefault(); $(this).parent('div').remove(); h--;
	        if (h != 0) {
	        	$('.operation_' + (h+1)).append('<a href="#" class="remove_hour"><button class="btn btn-danger"><i class="fa fa-minus"></i></button></a>');
	    	}
	    })

	});
</script>
</html>