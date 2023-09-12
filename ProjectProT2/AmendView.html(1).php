<!-- Written by Abdulaziz Aloufi
	Student ID: C00266252
-->
<!DOCTYPE html>
<html>
    <head>
        <title>Amend View</title>
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
            <li><a href=" deleteScreen.html.php"> Delete Company </a></li>
            <li><a href="Home.html"> Home </a></li>
        </ul>
    </div>

<body>
    <body>
	
	<div class="container2">
  	 

        <h2> Amend/View a Company</h2>
        <?php
         include 'listbox2.php';
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
                document.getElementById("display").innerHTML="";
                document.getElementById("Company_ID").value = personDetails[0];
                document.getElementById("Company_Name").value = personDetails[1];
                document.getElementById("Company_Address").value = personDetails[2];
                document.getElementById("Company_Phone").value = personDetails[3];
                document.getElementById("Website").value = personDetails[4];
                document.getElementById("Contact_Person_Name").value = personDetails[5];
                document.getElementById("Contract_Person_Phone").value = personDetails[6];
                document.getElementById("Contact_Person_Email").value = personDetails[7];
				document.getElementById("Company_Des").value = personDetails[8];

            }

            function toggleLock()
            {
                if (document.getElementById("amendViewbutton").value == "Amend Details")
                {
                    document.getElementById("Company_Name").disabled = false;
					document.getElementById("Company_Address").disabled = false;
					document.getElementById("Company_Phone").disabled = false;
					document.getElementById("Website").disabled = false;
                    document.getElementById("Contact_Person_Name").disabled = false;
                    document.getElementById("Contract_Person_Phone").disabled = false;
					document.getElementById("Contact_Person_Email").disabled = false;
					document.getElementById("Company_Des").disabled = false;
                    document.getElementById("amendViewbutton").value = "View Details";
                }
                else
                {
                    document.getElementById("Company_Name").disabled = true;
					document.getElementById("Company_Address").disabled = true;
					document.getElementById("Company_Phone").disabled = true;
					document.getElementById("Website").disabled = true;
                    document.getElementById("Contact_Person_Name").disabled = true;
                    document.getElementById("Contract_Person_Phone").disabled = true;
					document.getElementById("Contact_Person_Email").disabled = true;
					document.getElementById("Company_Des").disabled = true;
                    document.getElementById("amendViewbutton").value = "Amend Details";
                }
            }

            function confirmCheck()
            {
                var response;
                response = confirm('Are you sure you want to save this changes?');
                if (response){

                
                document.getElementById("Company_ID").disabled = false;
                document.getElementById("Company_Name").disabled = false;
                document.getElementById("Company_Address").disabled = false;
                document.getElementById("Company_Phone").disabled = false;
                document.getElementById("Website").disabled = false;
                document.getElementById("Contact_Person_Name").disabled = false;
                document.getElementById("Contract_Person_Phone").disabled = false;
                document.getElementById("Contact_Person_Email").disabled = false;
				document.getElementById("Company_Des").disabled = false;
                return true;

                }
                else{
                    populate();
                    toggleLock();
                    return false;
                }
            }
      </script>
	 
     <p id = "display"></p>
       
		 
				
     <form name="myForm" action="AmendView.php" onsubmit="return confirmCheck()" method="post">
			 
	    
	
		
		  
        <label for ="Company_ID">Company Id: </label>
	    <input type="text" name = "Company_ID" id = "Company_ID" disabled>	
		<br>
		<br>
	  
			
	
        <label for ="Company_Name">Company Name: </label>
        <input type="text" name = "Company_Name" id = "Company_Name" disabled>	
		<br>
		<br>
					
		
		
        <label for ="Company_Address">Address: </label>
        <input type="text" name = "Company_Address" id = "Company_Address" disabled>
	    <br>
		<br>
		
		
	
        <label for= "Company_Phone">Phone</label>
        <input type="text" name = "Company_Phone" id = "Company_Phone" disabled>
	    <br>
		<br>
		
		
		
        <label for= "Website">Website: </label>
		<input type="text" name = "Website" id = "Website" disabled>

		<br>
		<br>
		
		<label for = "Contact_Person_Name">Contact Person Name: </label>
        <input type="text" name = "Contact_Person_Name" id = "Contact_Person_Name" disabled>
		<br>
		<br>
		
        <label for ="Contract_Person_Phone">Contract Person Phone: </label>
		<input type="text" name = "Contract_Person_Phone" id = "Contract_Person_Phone" disabled>
        <br>
		<br>
		
			
		<label for ="Contact_Person_Email">Contact Person Email: </label>
        <input type="email" name = "Contact_Person_Email" id = "Contact_Person_Email" disabled>
		<br>
		<br>
			
	    <label for ="Company_Des">Company Descreiption: </label>
   		<input type="text" name = "Company_Des" id = "Company_Des" disabled>
			 
        <br>
		<br>
		
		<input type = "button" value="Amend Details" id = "amendViewbutton" onclick="toggleLock()">
      
        <input type = "submit" value = "Save Changes" class="button">
			
			
        </form>
			
	 
	 </div>
		  
 
    </body>
</html>