<?php
session_start();
	$db = new mysqli('localhost', 'root', '', 'per');

	if($db->connect_errno > 0){
		die('Unable to connect to database [' . $db->connect_error . ']');
	}
	?>






<link rel="stylesheet" href="style.css"/>
<script language="javascript" type="text/javascript" src="add_data.js"></script> 
<section class="body-content">
	<div id="body-container">

			<h1 style= "text-align: center;"> STAFF IN CONFIDENCE</h1>
		<div style= "padding-left: 20px;">
					
			<p> r. Occasion for Report (Tick as appropriate).</p>
				<ol > 
					<li>Annual.</li>
					<li>On Posting of Offr Reported Upon.</li>
					<li>On posting of Reporting Offr.</li>
					<li>Special.</li>
					
				</ol>
				<p>s.Period of Report.     From:.....................    To:......................</p>

		
				<ol > 
				
					<li style= "text-decoration: underline;">Deployment. </li>
				</ol>
			











		</div>
		<div><a href="page3.php">Page 3</a></div>
		<h1 style= "text-align: center;">STAFF IN CONFIDENCE</h1>
	</div>	
	
</section>			


