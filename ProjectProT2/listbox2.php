<!-- Written by Abdulaziz Aloufi
	Student ID: C00266252
-->
<?php
include "dbase.inc.php";

date_default_timezone_set('UTC');


$sql = "SELECT Company_ID, Company_Name, Company_Address, Company_Phone, Website, Contact_Person_Name, Contract_Person_Phone, Contact_Person_Email, Company_Des FROM Companies where Deleted_Company = 0";

if (!$result = mysqli_query($con, $sql))
{
    die( 'Error in querying the database' . mysqli_error($con));
}

echo "<br><select name = 'listbox' id = 'listbox' onclick = 'populate()'>";

while ($row = mysqli_fetch_array($result))
{
    $id = $row['Company_ID'];
    $cname = $row['Company_Name'];
    $sAddress = $row['Company_Address'];
    $sPhone = $row['Company_Phone'];
    $webs = $row['Website'];
    $contPerNm = $row['Contact_Person_Name'];
    $contPerPh= $row['Contract_Person_Phone'];
    $contPerEm = $row['Contact_Person_Email'];
	$coDes = $row['Company_Des'];
    $allText = "$id,$cname,$sAddress,$sPhone,$webs,$contPerNm,$contPerPh,$contPerEm,$coDes";
    echo "<option value = '$allText'>$cname $webs</option>";
}       
echo "</select>";
mysqli_close($con);

?>