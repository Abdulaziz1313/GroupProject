<!-- Written by Abdulaziz Aloufi
	Student ID: C00266252
-->
<?php
include 'dbase.inc.php';

date_default_timezone_set('UTC');



$sql = "UPDATE Companies SET Company_Name = '$_POST[Company_Name]',
        Company_Address = '$_POST[Company_Address]',
        Company_Phone = '$_POST[Company_Phone]',
        Website = '$_POST[Website]',
        Contract_Person_Phone = '$_POST[Contract_Person_Phone]',
        Contact_Person_Name= '$_POST[Contact_Person_Name]',
		Contact_Person_Email= '$_POST[Contact_Person_Email]',
		Company_Des= '$_POST[Company_Des]'
        WHERE Company_ID = '$_POST[Company_ID]' ";

        if (! mysqli_query($con,$sql ))
        {
            echo "Error ".mysqli_error($con);

        }
        else
        {
            
            if (mysqli_affected_rows($con) != 0)
            {
                echo mysqli_affected_rows($con)."record(s) updated<br>";
                echo "Company ID". $_POST['Company_ID'].",".$_POST['Company_Address'].",".$_POST['Contact_Person_Email'].",".$_POST['Company_Des'].",".$_POST['Company_Phone'].",".$_POST['Website'].",".$_POST['Contract_Person_Phone'].",".$_POST['Contact_Person_Name'].
                 " has been updated";
            }
            else{
                echo "No records were changed";
            }
			
		}


        mysqli_close($con);
        ?>

        <form action = "AmendView.html.php" method ="post" >

        <input type = "submit" value = "Return to Previous Screen">
    </form>