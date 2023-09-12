<!-- Written by Abdulaziz Aloufi
	Student ID: C00266252
-->
<?php
session_start();
include 'deleteScreen.html.php'; ?><br><br>

<?php
include 'dbase.inc.php';

$sql = "UPDATE Companies SET Deleted_Company = true WHERE Company_ID = '$_POST[delCompany_ID]'";

if (! mysqli_query($con,$sql))
{
    echo "Error ".mysqli_error($con);
}

$_SESSION["Company_ID"] = $_POST['delCompany_ID'];
$_SESSION["Company_Name"] = $_POST['delCompany_Name'];
$_SESSION["Company_Address"] = $_POST['delCompany_Address'];
$_SESSION["Company_Phone"] = $_POST['delCompany_Phone'];
$_SESSION["Website"] = $_POST['delWebsite'];
$_SESSION["Contact_Person_Name"] = $_POST['delContact_Person_Name'];
$_SESSION["Contract_Person_Phone"] = $_POST['delContract_Person_Phone'];
$_SESSION["Contact_Person_Email"] = $_POST['delContact_Person_Email'];
$_SESSION["Company_Des"] = $_POST['delCompany_Des'];

mysqli_close($con);
?>

<script>
window.location = "deleteScreen.html.php"
</script>
