<!DOCTYPE html>
<html>
<head>
	<?php include 'media/include/head.php' ;?>
</head>
<body>
<div class="container">
	<!-- Header -->
	<div class="page-header">
		<h1><i class="text-muted fa fa-database"></i> SOWEGA CASA <small>Resource Directory</small></h1>
		<a href="index.php"><button class="btn btn-success">Add Resource Directory</button></a>
	</div>
	<!-- /.Header -->
	<h3>Resource Directory</h3>
	<!-- Table -->
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Resource Name</th>
					<th>Address</th>
					<th>Program Type</th>
					<th>Description</th>
					<th>Service Areas</th>
					<th>Operation</th>
					<th>Keywords</th>
				</tr>
			</thead>
			<tbody>
				<?php
					include "media/sql_functions/connectdb.php" ;
					include "media/sql_functions/selectFunctions.php" ;

					$sql="SELECT * FROM resource ORDER BY name";
					$result=mysql_query($sql);

					while($row = mysql_fetch_array($result)) 
					{
						$id = $row['ID'];
						$name = $row['name'];
						$street1 = $row['street1'];
						$street2 = $row['street2'];
						$city = $row['city'];
						$zip = $row['zipcode'];
						$programType = selectProgramType ($row['programType_ID']);
						$website = $row['website'];
						$purpose = $row['purpose'];
						$mission = $row['mission'];
						$desc = $row['description'];
						$eligibility = $row['eligibility'];
						$fees = $row['fees'];

						if ($website != null) {
							$name = "<a href=\"$website\">$name</a>";
						}
						if ($purpose != null) {
							$purpose = "<p><b>Purpose:</b> $purpose</p>";
						}
						if ($mission != null) {
							$mission = "<p><b>Mission:</b> $mission</p>";
						}
						if ($desc != null) {
							$desc = "<p>$desc</p>";
						}

						if ($eligibility != null) {
							$eligibility = "<p><b>Eligibility:</b> $eligibility</p>";
						}
						if ($fees != null) {
							$fees = "<p><b>Fees:</b> $fees</p>";
						}

						if ($street2 != null) {
							$street = $street1 . "<br>" . $street2;
						} else {
							$street = $street1;
						}

						$serviceAreas = implode("<br>", selectResourceServiceArea($id));

						$operation = implode("", selectResourceOperation($id));

						$keywords = implode("<br>", selectKeyword($id));
						
						echo "
						<tr>
							<td>$name</td>
							<td class=\"col-md-2\">$street<br>$city, GA $zip</td>
							<td>$programType</td>
							<td class=\"col-md-3\">$desc $purpose $mission $eligibility $fees</td>
							<td class=\"col-md-2\">$serviceAreas</td>
							<td class=\"col-md-3\">$operation</td>
							<td class=\"col-md-3\">$keywords</td>
						</tr>";
					}
					mysql_close($link);
				?>
				
			</tbody>
		</table>
	</div>
		
					
				
</body>
<script>

</script>
</html>