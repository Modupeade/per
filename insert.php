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
        commission, corps, rank_date, dob, pob, state,) 
		VALUES 
		('$_POST[surname]',
        '$_POST[rank]', '$_POST[number]', '$_POST[sex]','$_POST[commission]','$_POST[corps]','$_POST[rank_date]','$_POST[dob]','$_POST[pob]','$_POST[state]');";


  mysql_query($sql);

  echo "<h2>Your registration was successful!</h2>";

  mysql_close($con);
}
?>



