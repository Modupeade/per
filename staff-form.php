 <?php
session_start();
$db = new mysqli("localhost", "root", "", "per");
if($db->connect_errno > 0 ){
	die("Unable to connect to database".$db->connect_error);
}
if(!isset($_SESSION['user_id'])){
	die('Unauthorized Access');
}else{
	$db = new mysqli('localhost', 'root', '', 'per');

	if($db->connect_errno > 0){
		die('Unable to connect to database [' . $db->connect_error . ']');
	} 
	
}

	

if (isset($_POST['submit']))
{
    $surname   = $_POST['surname'];
    $rank  = $_POST['rank'];
    $number = $_POST['number'];
    $sex    = $_POST['sex'];
    $commission = $_POST['commission'];
    $corps    = $_POST['corps'];
	$rank_date = $_POST['rank_date'];
    $dob      = $_POST['dob'];
    $pob     = $_POST['pob'];
    $state     = $_POST['state'];
	$awards = $_POST['awards'];
	$years = $_POST['years'];
	if(count($awards) != count($years)){
		print_r($awards);
		print_r($years);
		echo "awards ". count($awards);
		echo " years ". count($years);
		die("show error telling the user fill both and years");
		// show error telling the user fill both and years
	}else{
		for($i=0; $i < count($awards); $i++){
		$sql = "INSERT INTO `personnel_awards` (`id`, `user_id`, `title`, `year`) VALUES (NULL, '".$_SESSION['user_id']."', '".$awards[$i]."', '".$years[$i]."');";
		$db->query($sql);
		}
	}
	
	$sql = "UPDATE `per`.`personal_details` SET `surname`='$surname',`rank`='$rank',`number`='$number',`sex`='$sex', `commission`='$commission', `corps`='$corps',`rank_date`='$rank_date',`dob`='$dob',`pob`='$pob',`state`='$state' WHERE user_id='".$_SESSION['user_id']."' ";
if ($db->query($sql) === TRUE) {
        echo "Record updated successfully";
} else {
        echo "Error updating record: " . $db->error;
}
}
$ret=$db->query( "SELECT * FROM personal_details  WHERE user_id='".$_SESSION['user_id']."' ") or die("Could not execute query: " .$db->error);
$user = mysqli_fetch_assoc($ret);
$ret=$db->query( "SELECT * FROM personnel_awards  WHERE user_id='".$_SESSION['user_id']."' ") or die("Could not execute query: " .$db->error);
$awards = mysqli_fetch_all($ret);	
	
	

?>

<link rel="stylesheet" href="style.css"/>
<script src= "js/jquery.min.js"></script> 
<script src= "js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="css/bootstrap-theme.min.css">
<script src="js/jquery-1.11.3.min.js"></script>
<script src= "js/jquery.mobile.customized.min.js"></script> 
<script src= "js/bootstrap.min.js"></script> 
<link href="css/bootstrap.min.css" rel= "stylesheet"/>
<script language="javascript" type="text/javascript" src="add_data.js"></script> 
<section class="body-content">
	<div id="body-container">

			<h1 style= "text-align: center;"> STAFF IN CONFIDENCE</h1>
			<div style= "padding-left: 20px;">
				<h3 style= "text-decoration: underline;"> OFFICER'S PARTICULARS</h3>
					<ol > 
						<li style= "text-decoration: underline;">Personal Details </li>
					</ol>
			</div>
		<div style= "padding-left: 44px; width: 870px;">
			<form action="staff-form.php" method="POST">
				<div style= "padding-left: 40px; padding-right:10px; width: 750px;">
					<div style="width: 400px; float:left; height:60px;">
						<label>
							a. &nbsp;Surname &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Other names 
							<input type="text"  value="<?=$user['surname']?>" name="surname" style="width:380px; height:40px;"/>&nbsp;
						</label>
					</div>
					<div style="width: 100px; float:left; height:60px;">
						<label>			
							b. &nbsp;Rank
							<input type="text" value="<?=$user['rank']?>"  name="rank" style="width:90px; height:40px;"/>&nbsp;
						</label>
					</div>

					<div style="width: 130px; float:left; height:60px;">
						<label>
							c. &nbsp;P/NO
							<input type="text"  value="<?=$user['number']?>"  name="number" style="width:120px; height:40px;"/>
						</label>
					</div>
					<div style="width: 110px; float:left; height:60px;">
						<label>
							d.&nbsp;Sex
							<input type="text"  value="<?=$user['sex']?>" name="sex" style="width:100px; height:40px;"/ >&nbsp;
						</label>
					</div>
					<br/>
					<div style="width: 190px; float:left; height:60px; margin-top: 10px; padding-right:70px;">
						<label>
							e.&nbsp;Type of commission
							<input type="text"  value="<?=$user['commission']?>" name="commission" style="width:180px; height:40px;"/ >&nbsp;
						</label>
					</div>
					<div style="width: 160px; float:left; height:60px; margin-top: 10px; padding-right:20px;">
						<label>
							f.&nbsp;Corps
							<input type="text" value="<?=$user['corps']?>" name="corps" style="width:150px; height:40px;"/ >&nbsp;
						</label>
					</div>
					<div style="width: 300px; float:left; height:60px; margin-top: 10px;">
						<label>
							g.&nbsp; Seniority Date on Rank
							<input type="text"  value="<?=$user['rank_date']?>"  name="rank_date" style="width:290px; height:40px;"/ >&nbsp;
						</label>
					</div>
					
					<br/>
					<div style="width: 140px; float:left; height:60px; margin-top: 10px; padding-right:20px;">
						<label>
							h.&nbsp; Date of Birth
							<input type="text" value="<?=$user['dob']?>"  name="dob" style="width:130px; height:40px;"/ >&nbsp;
						</label>
					</div>				
					<div style="width: 170px; float:left; height:60px; margin-top: 10px; padding-right:40px;">
						<label>
							i.&nbsp; Place of Birth
							<input type="text" value="<?=$user['pob']?>"  name="pob" style="width:160px; height:40px;"/ >&nbsp;
						</label>
					</div>				
					<div style="width: 370px; float:left; height:60px; margin-top: 10px;">
						<label>
							j.&nbsp; LG/State of Origin
							<input type="text" value="<?=$user['state']?>" name="state" style="width:360px; height:40px;"/ >&nbsp;
						</label>
					</div>
					<div style="width: 740px; float:left;">	
						<p>k.&nbsp;Next of Kin/Address/Relationship.(Offrs must ensure that details of NOKs conform to records held in HQ CAR).</p>
						<label>
								<input type="text" value="Name (1st NOK):" name="state" style="width:700px; height:30px;"/ >&nbsp;
								<input type="text" value="Address:" name="state" style="width:700px; height:30px;"/ >&nbsp;
							<div style="width: 740px; float:left;">	
								<input type="text" value="Relationship:" name="state" style="width:353px; height:30px; "/ >
								<input type="text" value="Telephone:" name="state" style="width:343px; height:30px; "/ >
							</div>
								<input type="text" value="Name (2nd NOK):" name="state" style="width:700px; height:30px;"/ >&nbsp;
								<input type="text" value="Address:" name="state" style="width:700px; height:30px;"/ >&nbsp;
							<div style="width: 740px; float:left;">	
								<input type="text" value="Relationship:" name="state" style="width:353px; height:30px; "/ >
								<input type="text" value="Telephone:" name="state" style="width:343px; height:30px; "/ >
							</div>						
						</label>
						</br></br></br>
					</div>
					<div style="width: 740px; float:left;">	
						<div style="width: 330px; float:left; height:60px; margin-top: 10px;">
							<label>
								l. Languages
								<table style="width:100%">
								  <tr>
									<th>Languages</th>
									<th>Spoken</th>
									<th>Written</th>
								  </tr>
								  <tr>
									<td></td>
									<td></td>
									<td></td>
								  </tr>
								  <tr>
									<td></td>
									<td></td>
									<td></td>
								  </tr>
								  <tr>
									<td></td>
									<td></td>
									<td></td>
								  </tr>
								  <tr>
									<td></td>
									<td></td>
									<td></td>
								  </tr>
								</table>
							</label>
						</div>
						<div style="width: 360px; float:right; height:60px; margin-top: 10px; margin-left:20px;">
							<label>
							m.   Family
							<TEXTAREA Name="content" ROWS="9" COLS="40">
							(1) Marital Status:
							(2) Children  
									(a) Male (s): 
									(b) Female(s):
							</TEXTAREA>
							</label>
							
						</div>
					</div></br></br>
					<div style="width: 750px; float:left;margin-top: 80px;">	
						<div style="width: 360px; float:left; height:20px; margin-top: 10px;">
							<label>
							n. Qualifications.</br></br>
						 (1)   Military.(pjsc,psc,fdc,mni etc)
							<TEXTAREA Name="content" ROWS="6" COLS="50"></TEXTAREA>
							</label>
							
						</div>
						<div style="width: 360px; float:right; height:10px; margin-top: 10px; margin-left:20px;">
							<label>
							</br></br>
							(2)   Civil. (Diplomas, Degrees etc)
							<TEXTAREA Name="content" ROWS="6" COLS="50"></TEXTAREA>
							</label>
							
						</div>
					</div>
					<div style="width: 750px; float:left;margin-top: 140px;">	
						<div style="width: 300px; float:left; height:40px; margin-top: 10px;">
							<label>
							o.Membership of Professional Bodies.
							<TEXTAREA Name="content" ROWS="6" COLS="40"></TEXTAREA>
							</label>
							
						</div>
						<div style="width: 160px; float:left; height:40px; margin-top: 10px; margin-left:20px;">
							<label>
				              p.Decoration(s)Medals  
							<TEXTAREA Name="content" ROWS="6" COLS="10"></TEXTAREA>
							</label>
						<div style="width: 120px; float:right; height:40px; margin-top: 10px; margin-left:20px;">
							<label>
							 q.Award(s) (National/COAS).
							<TEXTAREA Name="content" ROWS="6" COLS="20"></TEXTAREA>
							</label>
							
						</div>
							
						</div>
					</div>
					
					
					
					
					<div style="width: 740px; float:left;margin-top: 150px;">	
						<label>
							q.  Award(s) (National/COAS) 
							
							<?php foreach($awards as $award): ?>
								<div><?=$award[2]?> <?=$award[3]?> <a href="edit-award.php?id=<?=$award[0]?>">Edit</a></div>
							<?php endforeach ?>
								<br/><input type="text" name="awards[]"/ >
								<input type="text" name="years[]" / >&nbsp;
						</label>	
					
					
						<div style="width: 100px; float:left; height:100px; margin-top: 5px;">
							<input type="button" value="Add+"onclick="addField()"/>
						</div>
					</div>
					<div>	
						<input type="submit" name="submit" value="submit">
					</div>
				</div>	
			</form>	
	
		</div>
			<div><a href="page2.php">Page 2</a></div>
			<h1 style= "text-align: center;">STAFF IN CONFIDENCE</h1>
			
	</div>	
	
</section>			

<?php include "footer.php"
?>
