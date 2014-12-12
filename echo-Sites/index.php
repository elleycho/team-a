<!DOCTYPE html>
<html>
<head>
	<?php include 'media/include/head.php' ;?>
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
  <div role="tabpanel">
    <!-- Nav tabs -->
    <ul class="nav nav-pills" role="tablist">
      <li role="presentation" class="active"><a href="#general" aria-controls="general" role="tab" data-toggle="tab">General</a></li>
      <li role="presentation"><a href="#contact" aria-controls="contact" role="tab" data-toggle="tab">Contact</a></li>
      <li role="presentation"><a href="#operation" aria-controls="operation" role="tab" data-toggle="tab">Operational Hours</a></li>
      <li role="presentation"><a href="#addition" aria-controls="addition" role="tab" data-toggle="tab">Additional</a></li>
    </ul>
    <hr></hr>
    <div class="tab-content">
      <div role="tabpanel" class="tab-pane active" id="general">
      		<!-- Name -->
      		<div class="row">
          	<label class="col-sm-1 control-label">Name</label>
      			<div class="col-sm-4">
      				<input type="text" class="form-control" id="name" value="Resource 1" required>
      			</div>
            <!-- Program Type -->
            <label class="col-sm-2 control-label" style="text-align:right;">Program Type</label>
            <div class="col-sm-4">
              <select class="form-control" id="programType" required>
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
            <!-- /.Program Type -->
          </div>
      		<!-- /.Name -->
          <br>
      		<!-- Address -->
          <div class="row">
      			<label class="col-sm-1 control-label">Address</label>
      			<div class="col-sm-4" style="padding-bottom: 10px;">
      				<!-- Street 1 -->
      				<input type="text" class="form-control" id="street1" placeholder="Street 1" value="Street 1" required>
      			</div>
            <!-- Website -->
            <label class="col-sm-2 control-label" style="text-align:right;">Website</label>
            <div class="col-sm-4">
              <input type="url" class="form-control" id="website" value="http://www.google.com" required>
            </div>
            <!-- /.Website -->
          </div>
          <div class="row">
            <div class="col-sm-1"></div>
      			<div class="col-sm-4" style="padding-bottom: 10px;">
      				<!-- Street 2 -->
      				<input type="text" class="form-control" id="street2" placeholder="Street 2" value="Street 2" required>
      			</div>
          </div>
          <div class="row">
      			<div class="col-sm-1"></div>
      			<div class="col-sm-2" style="padding-bottom: 10px;">
      				<!-- City -->
      				<input type="text" class="form-control" id="city" placeholder="City" value="Americus" required>
      			</div>
      			<div class="col-sm-2">
      				<!-- ZipCode -->
      				<input type="number" class="form-control" id="zip" placeholder="Zip Code" value="20102" required>
      			</div>
          </div>
      		<!-- /.Address -->
          <div class="row">
            <!-- Purpose -->
            <label class="col-sm-1 control-label" style="text-align:right;">Purpose</label>
            <div class="col-sm-4">
              <textarea rows="4" class="form-control" id="purpose">Purpose 1</textarea>
            </div>
            <!-- /.Purpose -->
      		<!-- Mission -->
      			<label class="col-sm-2 control-label" style="text-align:right;">Mission</label>
      			<div class="col-sm-4">
      				<textarea rows="4" class="form-control" id="mission">Mission 1</textarea>
      			</div>
      		<!-- /.Mission -->
          </div>
          <br>
          <div class="row">
        		<!-- Description -->
        		<label class="col-sm-1 control-label">Description</label>
        		<div class="col-sm-4">
        			<textarea rows="2" class="form-control" id="description">Description 1</textarea>
        		</div>
        		<!-- /.Description -->
        		<!-- Eligibility -->
        		<label class="col-sm-2 control-label" style="text-align:right;">Eligibility</label>
        		<div class="col-sm-4">
        			<textarea rows="2" class="form-control" id="eligibility">Eligibility 1</textarea>
        		</div>
        		<!-- /.Eligibility -->
          </div>
          <br>
          <div class="row">
        		<!-- Fees -->
        		<label class="col-sm-1 control-label">Fees</label>
        		<div class="col-sm-4">
        			<textarea rows="2" class="form-control" id="fees">Fees 1</textarea>
        		</div>
        		<!-- /.Fees -->
          </div>
        </div>
        <div role="tabpanel" class="tab-pane" id="contact">
      		<!-- Contact Person -->
          <h4>Contact Person</h4>
          <div class="row">
            <label class="col-sm-1 control-label">Contact(s)</label>
            <div class="col-sm-5">
              <select class="form-control" id="contactlist" multiple="multiple">
                    <option value="" readonly disabled>Select Contact</option>
                    <?php
                      include "media/sql_functions/connectdb.php" ;

                      $sql="SELECT * FROM contact ORDER BY lastName";
                      $result=mysql_query($sql);

                      while($row = mysql_fetch_array($result)) {
                        $id = $row['ID'];
                        $fname = $row['firstName'];
                        $lname = $row['lastName'];
                        $title = $row['title'];

                        $name = $lname . ', ' . $fname;
                        if ($title != NULL) {
                          $title = ' (' . $title . ')';
                        }
                        echo "<option value=\"$id\">$name $title</option>";
                      }
                      mysql_close($link);
                    ?>
                  </select>
              </div>
              <div class="col-sm-3">
                <button id="add-contact" class="btn btn-info" data-toggle="modal" data-target="#newContact"><i class="fa fa-plus"> New Contact</i></button>
              </div>
            </div>
            <br>
      		<div class="modal fade" id="newContact" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title">Add New Contact</h4>
            </div>
            <div class="modal-body">
              <div class="row">
                <label class="col-sm-3 control-label" style="text-align: right;">First Name</label>
                <div class="col-sm-7" style="padding-bottom: 10px;">
                  <!-- First Name -->
                  <input type="text" class="form-control" id="firstName">
                </div>
              </div>
              <div class="row">
                <label class="col-sm-3 control-label" style="text-align: right;">Last Name</label>
                <div class="col-sm-7" style="padding-bottom: 10px;">
                  <!-- Last Name -->
                  <input type="number" class="form-control" id="lastName">
                </div>
              </div>
              <div class="row">
                <label class="col-sm-3 control-label" style="text-align: right;">Title</label>
                <div class="col-sm-7">
                  <!-- Title -->
                  <input type="text" class="form-control" id="title">
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Contact</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
      		     		
      		<!-- /.Contact Person -->
      		<!-- Contact Number -->
        <h4>Contact Number(s)</h4>
      	<div class="number">
      		<div class="number_0">
            <div class="row">
        			<label class="col-sm-1 control-label">Number 1</label>
        			<div class="col-sm-4" style="padding-bottom: 10px;">
        				<!-- Number -->
        				<input type="text" class="form-control" name="number_0" placeholder="Number">
        			</div>
            </div>
            <div class="row">
        			<div class="col-sm-1"></div>
        			<div class="col-sm-4">
        				<!-- Description -->
        				<input type="text" class="form-control" name="description_0" placeholder="Description (i.e Emergency Hotline)">
        			</div>
        		</div>
          </div>
          <br>
        </div>
        <!-- /.Contact Number -->
        <div class="row">
          <div class="col-sm-1"></div>
          <div class="col-sm-4">
            <!-- Add Number button -->
            <button id="add-number" class="btn btn-info"><i class="fa fa-plus"> New Number</i></button>
          </div>
        </div>
      </div>
        <div role="tabpanel" class="tab-pane" id="operation">
          <h4>Operation</h4>
          
          <!-- Operation -->
          <div class="operation">
            <!-- recurrence -->
            <div class="row">
              <label class="col-sm-2 control-label">Recurrence</label>
              <div class="col-sm-5">
                <select class="form-control" id="recurrence">
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
            <!-- /.recurrence -->
            <br>
            <!-- open holidays? -->
            <div class="row">
              <label class="col-sm-2 control-label">Open Holidays?</label>
              <div class="col-sm-5">
                <label class="radio-inline">
                  <input type="radio" name="openHoliday_yes" value="1"> Yes
                </label>
                <label class="radio-inline">
                  <input type="radio" name="openHoliday_no" value="0"> No
                </label>
              </div>  
            </div>
            <!-- /.open holidays? -->
            <br>
            <!--- notes -->
            <div class="row">
              <label class="col-sm-2 control-label">Notes</label>
              <div class="col-sm-5">
                <textarea rows="2" class="form-control" id="notes"></textarea>
              </div>
            </div>
            <!-- /.notes -->
            <br>
            <!--- hours -->
            <div class="operation_1">
              <div class="row">
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
              </div>
              <br>
              <div class="row">
              <!--- start time -->
              <label class="col-sm-2 control-label">Start time</label>
              <div class="col-sm-5" style="padding-bottom: 10px;">
                <select class="form-control" style="width: 50px !important; display: inline !important;" name="startTime_0_a">
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
                <select class="form-control" style="width: 50px !important; display: inline !important;" name="startTime_0_b">
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
              </div>
              <!--- end time -->
              <div class="row">
              <label class="col-sm-2 control-label">End time</label>
              <div class="col-sm-5">
                <select class="form-control" style="width: 50px !important; display: inline !important;" name="endTime_0_a">
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
                <select class="form-control" style="width: 50px !important; display: inline !important;" name="endTime_0_b">
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
            <br>
            <!-- /.hours -->
          </div>
          <!--/.operation -->
          </div>
          <!-- add-hours -->
          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-5">
              <!-- Add Hours button -->
              <button id="add-hours" class="btn btn-info"><i class="fa fa-plus"> Hours</i></button>
            </div>
          </div>
          <!-- /.add-hours -->
        
      </div>
      <div role="tabpanel" class="tab-pane" id="addition">
      		<!-- Keywords -->
      		<div class="row">
      			<label class="col-sm-2 control-label">Keywords</label>
      			<div class="col-sm-5">
      				<input type="text" class="form-control" id="keywords" placeholder="Type in Keywords">
      			</div>
      		</div>
      		<!-- /.Keywords -->
          <br>
      		<!-- Service Areas -->
      		<div class="row">
      			<label class="col-sm-2 control-label">Service Area(s)</label>
      			<div class="col-sm-5">
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
      		<br><br>
      		<!--Submit button-->
      		<div class="row">
      	    <div class="col-sm-offset-2 col-sm-10">
      	     	<button type="submit" id="addResource" class="btn btn-lg btn-success pull-right">Submit</button>
      	    </div>
      	  </div>
        </div>
      
    </div>
  </div>
<hr style="margin: 35px 0px !important;"></hr>
</div>

</body>
<script>
	//START ADD RESOURCE
	$(document).on('click',"#addResource", function(){			
		//Resource Name
		var name = $("#name").val();
		//Resource Address
		var street1 = $("#street1").val();
		var street2 = $("#street2").val();
		var city = $("#city").val();
		var zip = $("#zip").val();
		//Resource Program Type
		var programType = $("#programType").val();
		//Resource Website
		var website = $("#website").val();
		//Resource Purpose
		var purpose = $("#purpose").val();
		//Resource Mission
		var mission = $("#mission").val();
		//Resource Description
		var description = $("#description").val();
		//Resource Eligibility
		var eligibility = $("#eligibility").val();
		//Resource Fees
		var fees = $("#fees").val();

		var msg = "Adding Resource: " + name + 
			"\nAddress: " + street1 + "\n" + street2 + "\n" + city + ", " + zip +
			"\nProgram Type: " + programType +
			"\nWebsite: " + website +
			"\nPurpose: " + purpose +
			"\nMission: " + mission +
			"\nDescription: " + description + 
			"\nEligibility: " + eligibility +
			"\nFees: " + fees;

		alert(msg);

		$.post("media/sql_functions/addResource.php", {
			name: name,
			street1: street1,
			street2: street2,
			city: city,
			zip: zip,
			programType: programType,
			website: website,
			purpose: purpose,
			mission: mission,
			description: description,
			eligibility: eligibility,
			fees: fees
		}) .done(function(output){
			alert(output);
		});
	});
</script>
<script>
	$('#keywords').tokenfield();

	$(document).ready(function() {
		$('#serviceArea').multiselect({
            enableFiltering: true
        });

    $('#contactlist').multiselect({
            enableFiltering: true
        });

	    var x = 0;
	    $("#add-number").click(function(e){ //on add input button click
	        e.preventDefault();
			$(".remove_number").remove();
	        x++; //text box increment
	        $(".number").append('<div class="number_' + (x+1) + '"><div class="row"><label class="col-sm-1 control-label">Number ' + (x+1) + '</label><div class="col-sm-4" style="padding-bottom: 10px;"><input type="text" class="form-control" name="number_' + x + '" placeholder="Number"></div></div><div id="number_' + x + '_row" class="row"><div class="col-sm-1"></div><div class="col-sm-4"><input type="text" class="form-control" name="description_' + x + '" placeholder="Description"></div><a href="#" class="remove_number"><button class="btn btn-danger"><i class="fa fa-minus"></i></button></a></div><br></div>'); //add input box
	 
	    });
	    
	    $(".number").on("click",".remove_number", function(e){ //user click on remove text
	        e.preventDefault(); $(this).parents(':eq(1)').remove(); x--;

	        if (x != 0) {
            console.log($('#number_' + (x) + "_row"));
	        	$('#number_' + x + "_row").append('<a href="#" class="remove_number"><button class="btn btn-danger"><i class="fa fa-minus"></i></button></a>');
	    	}
	    })

	    var h = 0;
	    $("#add-hours").click(function(e){ //on add input button click
	        e.preventDefault();
			$(".remove_hour").remove();
	        h++; //text box increment
	        var divHour = '<div class="operation_' + (h+1) + '">' +
          '<div class="row">' +
				'<!--- days of week -->' +
				'<label class="col-sm-2 control-label">Day(s) of Week</label>' +
				'<div class="col-sm-8" style="padding-bottom: 10px;" name="daysOfWeek_' + h + '">';
				<?php
					include "media/sql_functions/connectdb.php" ;
					$div = "";
					$sql="SELECT * FROM dayOfWeek WHERE ID > 0 AND ID < 6 ORDER BY ID";
					$result=mysql_query($sql);

					while($row = mysql_fetch_array($result)) {
						$id = $row['ID'];
						$name = $row['dayOfWeek'];
						$div .= '<label class=\"checkbox-inline\"><input type=\"checkbox\" value=\"'.$id.'\">'.$name.'</label>';
					}
						
					$sql1="SELECT * FROM dayOfWeek WHERE ID < 1 OR ID > 5 ORDER BY ID";
					$result1=mysql_query($sql1);
					$div .= '<br>';
					while($row1 = mysql_fetch_array($result1)) {
						$id = $row1['ID'];
						$name = $row1['dayOfWeek'];
						$div .= '<label class=\"checkbox-inline\"><input type=\"checkbox\" value=\"'.$id.'\">'.$name.'</label>';
					}
					mysql_close($link);

					echo "divHour+='".$div."'";
				?>	
				divHour += '</div>' + 
        '<div class="col-sm-2" id="operation_' + (h+1) + '_row"><a href="#" class="remove_hour"><button class="btn btn-danger"><i class="fa fa-minus"></i></button></a></div></div></div>' +
				'<!--- start time -->' +
				'<div class="row"><label class="col-sm-2 control-label">Start time</label>' +
				'<div class="col-sm-8" style="padding-bottom: 10px;">' +
					'<select class="form-control" style="width: 50px !important; display: inline !important;" name="startTime_' + h + '_a">' +
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
					'<select class="form-control" style="width: 50px !important; display: inline !important;" name="startTime_' + h + '_b">' +
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
				'</div></div>' +
				'<!--- end time -->' +
				'<div class="row"><label class="col-sm-2 control-label">End time</label>' +
				'<div class="col-sm-10">' +
					'<select class="form-control" style="width: 50px !important; display: inline !important;" name="endTime_' + h + '_a">' +
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
					'<select class="form-control" style="width: 50px !important; display: inline !important;" name="endTime_' + h + '_b">' +
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
				'</div></div><br>';
		
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