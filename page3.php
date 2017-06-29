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
			<a style="padding-left: 20px;" href="page2.php">BACK</a>
		<div style= "width: 800px; height:800px; padding-left: 40px; padding-right: 40px; ">
			<ol > 
				<li style= "text-decoration: underline;"><b>Courses and Seminars attended (Army Sponsored).</b> </li>
			</ol>
			<div style="width: 700px; height:200px;">
			<label>
			
				Course/Seminar
				<input type="text" name="" value="" style= "width: 300px;" /><br><br>
				Period
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="" value="" style= "width: 300px;"/><br><br>
				Location
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="" value="" style= "width: 300px;" /><br><br>
				Grade
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" name="" value="" style= "width:300px;"/><br><br>
			</label>
				<div style="width: 100px; float:left; height:100px; margin-top: 5px;">
					<input type="button" value="Add+"onclick="addField()"/>
				</div>
			</div>
			<div style="width: 700px; height:200px;">
			<ol > 
				<li style= "text-decoration: underline;"><b>Details of Promotion Examinations.</b> </li>
			</ol>
			<p>Promotion/Staff College Qualifying Exam(s)</p>
			<label>
			LCPPE:<input type="text" name="" value="Date and Remarks" style= "width: 150px;"/>
			CMPPE:<input type="text" name="" value="Date and Remarks" style= "width: 150px;"/>
			SSCQE:<input type="text" name="" value="Date and Remarks" style= "width: 150px;"/>
			</label>
			<div style="width: 100px; float:left; height:100px; margin-top: 5px;">
					<input type="button" value="Add+"onclick="addField()"/>
				</div>
			</div>
			
			<div style="width: 700px; height:200px;">
				8.&nbsp;&nbsp;	Hobbies:
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" value="" name="state" style="width:300px; height:30px;"/ ><br><br>
				9.&nbsp;&nbsp;	Telephone No(s):	
						<input type="text" value="" name="state" style="width:300px; height:30px;"/ ><br><br>

		
				10.&nbsp;&nbsp;	Email Address:
					&nbsp;<input type="text" value="" name="state" style="width:300px; height:30px;"/ ><br>			

				
					<ol > 
						<li style= "text-decoration: underline;"><b>11.	Declaration by Officer Reported Upon.</b> </li><p>	I hereby declare that the information provided above is true.</p> 
						
					</ol>
						<TEXTAREA Name="content" ROWS="2" COLS="40">Sign:......................&nbsp;Date...................			
						</TEXTAREA>
				
					
					
			</div>
			<div style="margin-top:70px;">	
				<input type="submit" name="submit" value="submit">
			</div>			
		
		</div>	
			<div style="padding-left:10px;"><a href="page4.php">Page 4</a></div>
		<h1 style= "text-align: center;">STAFF IN CONFIDENCE</h1>
	</div>	
	
</section>			
