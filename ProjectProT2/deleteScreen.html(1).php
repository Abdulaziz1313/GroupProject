<!-- Written by Abdulaziz Aloufi
	Student ID: C00266252
-->
<?php session_start();
?>

<html>
    <head>
		<title>Delete Company</title>
    </head>
    
		<link rel="Stylesheet" href=" view1.css" >

<body>
    <div class="container">
        <br>
        <br>
        <br>
        <h1>Other Pages</h1>
        <br>
        <ul>
			<li><a href=" AddComp.html"> Add a Company </a></li>
            <li><a href=" AmendView.html.php"> Amend/View Company </a></li>
            <li><a href="Home.html"> Home </a></li>
        </ul>
    </div>

<body>
    <body>
	
	<div class="container2">


    
		  
        <h1> Delete Company</h1>
		<br>
		<br><BR><br><br><BR><br><br>
        <h2> Please Select a company and then click the delete button if you wish to delete</h2>
		<br>

        <?php
		
			include 'listbox.php';
        ?>
		<br>
		<br>

        <script>
            function populate()
            {
                var sel = document.getElementById("listbox");
                var result;
                result = sel.options[sel.selectedIndex].value;
                var personDetails = result.split(',');
                document.getElementById("display").innerHTML = "";
                document.getElementById("delCompany_ID").value = personDetails[0];
                document.getElementById("delCompany_Name").value = personDetails[1];
                document.getElementById("delCompany_Address").value = personDetails[2];
                document.getElementById("delCompany_Phone").value = personDetails[3];
                document.getElementById("delWebsite").value = personDetails[4];
                document.getElementById("delContact_Person_Name").value = personDetails[5];
                document.getElementById("delContract_Person_Phone").value = personDetails[6];
                document.getElementById("delContact_Person_Email").value = personDetails[7];
				document.getElementById("delCompany_Des").value = personDetails[8];

            }


            function confirmCheck()
            {
                var response;
                response = confirm('Are you sure you want to delete this company?');
                if (response){

                
                document.getElementById("delCompany_ID").disabled = false;
                document.getElementById("delCompany_Name").disabled = false;
                document.getElementById("delCompany_Address").disabled = false;
                document.getElementById("delCompany_Phone").disabled = false;
                document.getElementById("delWebsite").disabled = false;
                document.getElementById("delContact_Person_Name").disabled = false;
                document.getElementById("delContract_Person_Phone").disabled = false;
                document.getElementById("delContact_Person_Email").disabled = false;
				document.getElementById("delCompany_Des").disabled = false;
                return true;

                }
                else{
                    populate();
                    return false;
                }
            }
        </script>
	 
     <p id = "display"></p>
       
		
         <form name="deleteScreen" action="delete.php" onsubmit="return confirmCheck()" method="post" class="FormPOs">
        <label for ="delCompany_ID">Company Id: </label>
        <input type="text" name = "delCompany_ID" id = "delCompany_ID" disabled><br><br>

        <label for ="delCompany_Name">Company Name: </label>
        <input type="text" name = "delCompany_Name" id = "delCompany_Name" disabled><br><br>

        <label for ="delCompany_Address">Address: </label>
        <input type="text" name = "delCompany_Address" id = "delCompany_Address" disabled><br><br>

        <label for= "delCompany_Phone">Phone</label>
        <input type="delnumber" name = "delCompany_Phone" id = "delCompany_Phone" disabled><br><br>

        <label for= "delWebsite">Website: </label>
        <input type="text" name = "delWebsite" id = "delWebsite" disabled><br><br>

        <label for = "delContact_Person_Name">Contact Person Name: </label>
        <input type="text" name = "delContact_Person_Name" id = "delContact_Person_Name" disabled><br><br>

        <label for ="delContract_Person_Phone">Contract Person Phone: </label>
        <input type="number" name = "delContract_Person_Phone" id = "delContract_Person_Phone" disabled><br><br>

        <label for ="delContact_Person_Email">Contact Person Email: </label>
        <input type="email" name = "delContact_Person_Email" id = "delContact_Person_Email" disabled><br><br>
			 
	    <label for ="delCompany_Des">Company Descreiption: </label>
        <input type="text" name = "delCompany_Des" id = "delCompany_Des" disabled><br><br>
			 
		<input type = "submit" value="Delete the record!" class = "button">
        <br><Br>
       
 
			
        </form>
			        <?php
            if (ISSET($_SESSION["Company_ID"])) 
            {
                 echo "<h1>Record deleted for ".
            $_SESSION["Company_Name"]. " ".$_SESSION["Company_Address"]. " ".$_SESSION["Company_Phone"]. " ".$_SESSION["Website"]. " ".$_SESSION["Contact_Person_Name"]
            . " ".$_SESSION["Contract_Person_Phone"]. " ".$_SESSION["Contact_Person_Email"]. " ".$_SESSION["Company_Des"]. "</h1>";
            } 
            session_destroy();

            
            ?>
			 </div>
    </body>
</html>
		
