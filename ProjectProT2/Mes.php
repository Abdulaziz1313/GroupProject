<!-- Written by Abdulaziz Aloufi
	Student ID: C00266252
-->
<?php
include 'dbase.inc.php';
date_default_timezone_set('utc');

$sql = "Insert into Companies ( Company_Name, Company_Address , Company_Phone, Website,Contact_Person_Name , Contract_Person_Phone, Contact_Person_Email, Company_Des)
VALUES ('$_POST[companyName]','$_POST[address]','$_POST[CompanyPhone]','$_POST[website]','$_POST[NUMBER]','$_POST[PhoneNumber]','$_POST[email]','$_POST[CompanyDes]')";
if (!mysqli_query($con, $sql))
{
	die ("An Error in the SQL Query:" . mysqli_error($con));
		 
}	


	include 'AddComp.html';
	
	

	 
?>