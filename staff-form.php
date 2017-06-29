<?php
// Only show the view when submit button was not clicked
if(!isset($_POST['submit'])){
	include_once("session.php");
	show_view();
	
}


function show_view($message = ""){
	include_once("database.php");
	global $db;
	$ret=$db->query( "SELECT * FROM personal_details  WHERE user_id='".$_SESSION['user_id']."' ") or die("Could not execute query: " .$db->error);
	$user = mysqli_fetch_assoc($ret);

	$ret=$db->query( "SELECT * FROM personnel_awards  WHERE user_id='".$_SESSION['user_id']."' ") or die("Could not execute query: " .$db->error);
	$awards = mysqli_fetch_all($ret, MYSQLI_ASSOC);	

	$ret=$db->query( "SELECT * FROM personnel_qualifications  WHERE user_id='".$_SESSION['user_id']."' AND type='m' ") or die("Could not execute query: " .$db->error);
	$military = mysqli_fetch_all($ret, MYSQLI_ASSOC);	
		
	$ret=$db->query( "SELECT * FROM personnel_qualifications  WHERE user_id='".$_SESSION['user_id']."' AND type='c' ") or die("Could not execute query: " .$db->error);
	$civil = mysqli_fetch_all($ret, MYSQLI_ASSOC);

	$ret=$db->query( "SELECT * FROM professional_bodies  WHERE user_id='".$_SESSION['user_id']."' ") or die("Could not execute query: " .$db->error);
	$professional = mysqli_fetch_all($ret, MYSQLI_ASSOC);

	$ret=$db->query( "SELECT * FROM decoration_medals  WHERE user_id='".$_SESSION['user_id']."' ") or die("Could not execute query: " .$db->error);
	$medals = mysqli_fetch_all($ret, MYSQLI_ASSOC);

	$ret=$db->query( "SELECT * FROM personnel_language  WHERE user_id='".$_SESSION['user_id']."' ") or die("Could not execute query: " .$db->error);
	$languages = mysqli_fetch_all($ret, MYSQLI_ASSOC);

	$ret=$db->query( "SELECT * FROM next_kin  WHERE user_id='".$_SESSION['user_id']."' ") or die("Could not execute query: " .$db->error);
	$kin = mysqli_fetch_assoc($ret);
	
	
?>
	<link rel="stylesheet" href="style.css"/>
<script language="javascript" type="text/javascript" src="add_data.js"></script> 
<script language="javascript" type="text/javascript" src="add_mili.js"></script> 
<script language="javascript" type="text/javascript" src="add_civil.js"></script> 
<script language="javascript" type="text/javascript" src="add_prof.js"></script>
<script language="javascript" type="text/javascript" src="add_medal.js"></script>
<script language="javascript" type="text/javascript" src="add_lang.js"></script>

<section class="body-content">
	<div id="body-container">
	<?php
	if($message != ""): ?>
		<div style="text-align:center; padding: 10px; background-color: #ffdece;"><?=$message?></div>
	<?php endif?>

			<h1 style= "text-align: center;"> STAFF IN CONFIDENCE</h1>
			<div style= "padding-left: 20px;">
				<h3 style= "text-decoration: underline;"> OFFICER'S PARTICULARS</h3>
					<ol > 
						<li style= "text-decoration: underline;">Personal Details </li>
					</ol>
			</div>
		<div style= "padding-left: 44px; width: 870px;">
			<form action="main.php" method="POST">
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
					<div  style="width: 740px; float:left;">	
						<p>k.&nbsp;Next of Kin/Address/Relationship.(Offrs must ensure that details of NOKs conform to records held in HQ CAR).</p>
						<label>
								Name (1st NOK):
								<input type="text" value="<?=$kin['nok1_name']?>" name="nok1_name" style="width:700px; height:30px;"/ >&nbsp;
								Address:<input type="text" value="<?=$kin['nok1_address']?>" name="nok1_address" style="width:700px; height:30px;"/ >&nbsp;
							<div style="width: 740px; float:left;">	
								Relationship:<br><input type="text" value="<?=$kin['nok1_relationship']?>" name="nok1_relationship" style="width:353px; height:30px; "/ >
								<br>Telephone:<br><input type="text" value="<?=$kin['nok1_telephone']?>" name="nok1_telephone" style="width:353px; height:30px; "/ >
							</div>
								Name (2nd NOK):<input type="text" value="<?=$kin['nok2_name']?>" name="nok2_name" style="width:700px; height:30px;"/ >&nbsp;
								Address:<input type="text" value= "<?=$kin['nok2_address']?>" name="nok2_address" style="width:700px; height:30px;"/ >&nbsp;
							<div style="width: 740px; float:left;">	
								Relationship:<br><input type="text" value="<?=$kin['nok2_relationship']?>" name="nok2_relationship" style="width:353px; height:30px; "/ >
								<br>Telephone:<br><input type="text" value="<?=$kin['nok2_telephone']?>" name="nok2_telephone" style="width:353px; height:30px; "/ >
							</div>
						</label>
						</br></br></br>
					</div>
					<div style="width: 740px; float:left;">	
						<div id="field-containerss"style="width: 400px; float:left; height:60px; margin-top: 10px;">
							<label>
								l. <b>Languages</b><br><br>
								<?php foreach($languages as $language): ?>
									<div><?=$language['title']?> :
									<?php if( $language['spoken'] && $language['written']){?>
										Spoken and Written
									<?php }else if ($language['spoken']){?>
										Spoken
									<?php }else if ($language['written']){?>
										Written
									<?php } ?>
									</div>
									<hr>
								<?php endforeach ?>
									<input type="text" name="languages[]" / >&nbsp;
								<select name="language_caps[]">
									<option value="s">Spoken</option>
									<option value="w">written</option>
									<option value="sw">Spoken and written</option>
								</select>
									<input type="button" value="Add+"onclick="addFieldlang()"/>	
							</label>
						</div>
						<div style="width: 300px; float:right; height:60px; margin-top: 10px; margin-left:20px;">
							<label>
								 m.   Family
								<br>
								(1) Marital Status:
									<input type="text" value="<?=$user['mstatus']?>" name="mstatus" style="width:360px; height:20px;"/ >&nbsp;
								(2) Children 
									<input type="text" value="<?=$user['children']?>" name="children" style="width:360px; height:20px;"/ >&nbsp;							
								(a) Male (s): 
									<input type="text" value="<?=$user['male_children']?>" name="male_children" style="width:360px; height:20px;"/ >&nbsp;
								(b) Female(s):
									<input type="text" value="<?=$user['female_children']?>" name="female_children" style="width:360px; height:20px;"/ >&nbsp;
							</label>	
						</div>
					</div></br></br>
					<div style="width: 750px; float:left;margin-top: 80px;">	
						<div id="field-containers" style="width: 360px; float:left; height:20px; margin-top: 10px;">
							<label>
									n. Qualifications.</br></br>
									(1)   Military.(pjsc,psc,fdc,mni etc)
								<?php foreach($military as $military): ?>
										<div><?=$military['title']?> <a href="edit-mili.php?id=<?=$military['id']?>">Edit</a></div>
								<?php endforeach ?>
									<br/><input type="button" value="Add+"onclick="addFieldMili()"/>
							</label>
						</div>
						<div id="field-containerx"style="width: 360px; float:right; height:10px; margin-top: 10px; margin-left:20px;">
							<label>
								</br></br>
								(2)   Civil. (Diplomas, Degrees etc)
							
								<?php foreach($civil as $civil): ?>
									<div><?=$civil['title']?> <a href="edit-civil.php?id=<?=$civil['id']?>">Edit</a></div>
								<?php endforeach ?>
								<br><input type="button" value="Add+"onclick="addFieldCivil()"/>
							</label>
						</div>
					</div>
					<div style="width: 750px; float:left;margin-top: 140px;">	
						<div id="fields-container" style="width: 300px; float:left; height:40px; margin-top: 10px;">
							<label>
							o.Membership of Professional Bodies.
							<?php foreach($professional as $professional): ?>
								<div><?=$professional['title']?> <a href="edit-prof.php?id=<?=$professional['id']?>">Edit</a></div>
							<?php endforeach ?>
							<br><input type="button" value="Add+"onclick="addFieldProf()"/>
							</label>
						</div>
						<div id="fields-containers" style="width: 300px; float:left; height:40px; margin-top: 10px; margin-left:20px;">
							<label>
								  p.Decoration(s)Medals  
								<?php foreach($medals as $medals): ?>
									<div><?=$medals['title']?> <a href="edit-medal.php?id=<?=$medals['id']?>">Edit</a></div>
								<?php endforeach ?>
								
								<br><input type="button" value="Add+"onclick="addFieldMedal()"/>
							</label>
						</div>
					</div>
					<div id="field-container" style="width: 740px; float:left;margin-top: 150px;">	
						<label>
							q.  Award(s) (National/COAS)
							
							<?php foreach($awards as $award): ?>
								<div><?=$award['title']?> <?=$award['year']?> <a href="edit-award.php?id=<?=$award['id']?>">Edit</a></div>
							<?php endforeach ?>
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
<?php include "footer.php";
}
