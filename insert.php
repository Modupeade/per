<?php
if( $_POST )
{
  $con = mysql_connect("localhost","root","password");

  if (!$con)
  {
    die('Could not connect: ' . mysql_error());
  }

$sql= "
  INSERT INTO personal_details (surname, rank, number, sex,
        commission, corps, rank_date, dob, pob, state, mstatus, children, male_children, female_children,) 
		VALUES 
		('$_POST[surname]',
        '$_POST[rank]', '$_POST[number]', '$_POST[sex]','$_POST[commission]','$_POST[corps]','$_POST[rank_date]','$_POST[dob]','$_POST[pob]','$_POST[state]', '$_POST[mstatus]', '$_POST[children]', '$_POST[male_children]', '$_POST[female_children]');";


  mysql_query($sql);
  

  echo "<h2>Your registration was successful!</h2>";

  mysql_close($con);
}
?>



