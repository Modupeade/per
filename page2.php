<?php
if(!isset($_POST['update'])){
	include_once("session.php");
	show_view();
	
}
function show_view($message = ""){
	include_once("database.php");
	global $db;
	 $ret=$db->query( "SELECT * FROM unit_deployment  WHERE user_id='".$_SESSION['user_id']."' ") or die("Could not execute query: ".$db->error);
	  $deploy = mysqli_fetch_assoc($ret);

	 
	  
 ?>
	  
	  
	  
	  
<link rel="stylesheet" href="style.css"/>
<script language="javascript" type="text/javascript" src="add_data.js"></script> 
<section class="body-content">
	<div id="body-container" >
			<h1 style= "text-align: center;"> STAFF IN CONFIDENCE</h1>
			<a style="padding-left: 20px;" href="staff-form.php">BACK</a>
		<div style= "width: 800px; height:980px; padding-left: 40px; padding-right: 40px; ">
			<form action="update_unit.php" method="POST">

				<div style="width: 700px; display:inline-block">		
					<p > r.&nbsp;&nbsp;&nbsp; Occasion for Report (Tick as appropriate).</p>
						<ol>
							<li>Annual.<input type="radio"  name="occasion"  value="annual" style="width:50px; height:20px;"/>&nbsp;</li>
							<li>On Posting of Offr Reported Upon.<input type="radio"  name="occasion" value="posting_reported"  style="width:50px; height:20px;"/>&nbsp;</li>
							<li>On posting of Reporting Offr.<input type="radio"  name="occasion" value="posting_reporting" style="width:50px; height:20px;"/>&nbsp;</li>
							<li>Special.<input type="radio"  name="occasion" value="special"  style="width:50px; height:20px;"/>&nbsp;</li>
							
						</ol>
				
					<p>s.&nbsp;&nbsp;&nbsp;Period of Report.     From:.....................    To:......................</p>
				</div>
				<div style="width: 700px; height:100px;">
					<ol > 
						<li style= "text-decoration: underline;"><b>Deployment.</b> </li>
					</ol>
				
					<label>
						a.&nbsp;&nbsp;  Fmn or Unit
						<input type="text"  value="<?=$deploy['unit']?>" name="unit1" style="width:180px; height:40px;"/>&nbsp;
						b. &nbsp;&nbsp;Date TOS
						<input type="text" value="<?=$deploy['date_tos']?>" name="date_tos1" style="width:100px; height:40px;"/>&nbsp;
						c. &nbsp;&nbsp;Appt
						<input type="text"  value="<?=$deploy['appt']?>" name="appt1" style="width:100px; height:40px;"/><br><br>
						c. &nbsp;&nbsp;Period
						<input type="text"  value="<?=$deploy['period']?>" name="period1" style="width:100px; height:40px;"/>&nbsp;
						c. &nbsp;&nbsp;Remark
						<input type="text"  value="<?=$deploy['remark']?>" name="remark1" style="width:180px; height:40px;"/>
					</label>
				</div>
				<div style="width: 700px; height:200px;margin-top:40px;">
					
					d. &nbsp;&nbsp; Last 3 units/appts with dates.<br>
					
						<table id="unit-table" style="column-width: 50px;">
							 
							  <tr>
								<th>Serial</th> 
								<th>Units</th>
								<th>Appt</th>
								<th>Period</th>
								<th>Remarks</th>
							  </tr>
							  <tr>
								<td><input type="text"  value="1"  name="" /> </td>
								<td><input type="text"  value="<?=$deploy['unit']?>"  name="" /></td>
								<td><input type="text"  value="<?=$deploy['appt']?>"  name="" /></td>
								<td><input type="text"  value="<?=$deploy['period']?>"  name="" /></td>
								<td><input type="text"  value="<?=$deploy['remark']?>"  name="" /></td>	
							  </tr>
							  <tr>
								<td><input type="text"  value="2"  name="" /></td>
								<td><input type="text"  value="<?=$deploy['unit']?>"  name="" /></td>
								<td><input type="text"  value="<?=$deploy['appt']?>"  name="" /></td>
								<td><input type="text"  value="<?=$deploy['period']?>"  name="" /></td>
								<td><input type="text"  value="<?=$deploy['remark']?>"  name="" /></td>
							  </tr>
							  <tr>
								<td><input type="text"  value="3"  name="" /></td>
								<td><input type="text"  value="<?=$deploy['unit']?>"  name="" /></td>
								<td><input type="text"  value="<?=$deploy['appt']?>"  name="" /></td>
								<td><input type="text"  value="<?=$deploy['period']?>"  name="" /></td>
								<td><input type="text"  value="<?=$deploy['remark']?>"  name="" /></td>
							  </tr>
							
						</table>
						 <br><input type="submit" name="update" value="update"/>	

				</div>
				
				<div style="width: 700px; height:60px; ">
					<ol > 
					
						<li style= "text-decoration: underline;"><b>Medical Fitness. </b></li>
					</ol>
					
						a.&nbsp;&nbsp;	Fit <input type="checkbox"  value="" name="surname" style="width:50px; height:20px;"/>&nbsp;
						b.&nbsp;&nbsp;  Unfit <input type="checkbox"  value="" name="surname" style="width:50px; height:20px;"/>&nbsp;<br>
						<TEXTAREA Name="content" ROWS="8" COLS="90">c.&nbsp;&nbsp;State any impediment that will prevent the officer from being deployed in combat..........................................................................................................................................................................d.&nbsp;Rank/Name of Doctor................................ e.&nbsp;Unit.................&nbsp; f.Signature................................ g.   Stamp/Date................&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Note: Doctors must ascertain the offr’s medical condition before endorsing this column.It is a serious offence to declare an unfit person fit.
						</TEXTAREA>
					
				</div>
				<div style="width: 700px; height:60px; margin-top:140px;">
					<ol > 
						<li style= "text-decoration: underline;"><b>Annual Fitness Test.</b> </li>
					</ol>
						a.&nbsp;&nbsp;	Passed <input type="checkbox"  value="" name="surname" style="width:50px; height:20px;"/>&nbsp;
						b.&nbsp;&nbsp;   Failed <input type="checkbox"  value="" name="surname" style="width:50px; height:20px;"/>&nbsp;
						c.&nbsp;&nbsp;	 Exempted<input type="checkbox"  value="" name="surname" style="width:50px; height:20px;"/>&nbsp;<br>
						<TEXTAREA Name="content" ROWS="4" COLS="90">d.Reason(s) for Exemption:...........................................................&nbsp;   e.  Sign:.............................. f.  Stamp/Date:...........................
						</TEXTAREA>
					
				</div>
				<div style="width: 700px; height:60px; margin-top:80px;">
					<ol > 
						<li style= "text-decoration: underline;"><b>Mess Confirmation of Non-Indebtedness.</b> </li>
					</ol>
						<TEXTAREA Name="content" ROWS="4" COLS="90">a.Name of Secretary:.......................................................&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;b.	Signature..................c.   Stamp/Date...................			
						</TEXTAREA>
					
				</div>



				
			</form>

		</div>
			<div style="margin-top:60px; padding-left:10px;"><a href="page3.php">Page 3</a></div>
			<h1 style= "text-align: center;">STAFF IN CONFIDENCE</h1>
		
	</div>	
	
</section>			
<?php include "footer.php";
}
