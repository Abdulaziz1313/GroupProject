<!-- Written by Abdulaziz Aloufi
	Student ID: C00266252
-->
<?php 
include 'dbase.inc.php';
session_start();
echo '<link rel="stylesheet" href= "pass.css" type="text/css">';


if (isset($_SESSION['user']))
{
	
    if (isset($_POST['oldPass']) && isset($_POST['newPass']) && isset($_POST['confirmPass']))
    {
        $old = $_POST['oldPass'];
        $new = $_POST['newPass'];
        $confirm = $_POST['confirmPass'];

        $user = $_SESSION['user'];
		
        $sql = "SELECT * FROM EmployTable WHERE loginName = '$user' AND Password = '$_POST[oldPass]'";
	
        if (!mysqli_query($con, $sql))
        	echo "Error in Select query ".mysqli_error($con);
		
        else
        {
			
			
            if (mysqli_affected_rows($con) == 0)
			{
            buildPage($old, $new, $confirm);
            echo "
			<link rel='stylesheet' href= ' pass.css' type='text/css'>
			<section>
			<h1>Old password incorrect!</h1>
			</section>";
			}
        
		else
		    {
		
                if ($_POST['newPass'] != $_POST['confirmPass'])
            {
                buildPage($old, $new, $confirm);
                echo "
				<link rel='stylesheet' href= ' pass.css' type='text/css'>
				<section>
				<h2>New password do not match - Please try again.</h2>
				</section>";
            }
			
            else
            {
                $sql = "UPDATE EmployTable SET Password = '$_POST[newPass]' WHERE loginName = '$user' ";
                if (! mysqli_query($con, $sql))
               	    echo "Error in Update query ".mysqli_error($con);
                else
                {
                    if (mysqli_affected_rows($con) == 0)
                    {
                        buildPage($old, $new, $confirm);
                        echo "<
						<link rel='stylesheet' href= ' pass.css' type='text/css'>
						<section>
						h2>No changes made!</h2>
						</section>";
                    }
                    else
                    {
						  
                        echo "
						<link rel='stylesheet' href= ' Website2.css' type='text/css'>
						<h2>Congratulations, your password has been updated!</h2>
						<br>
                        <h3><input type ='button' value = 'Proceed to Main Menu' onclick = 'window.location = \"Home.html\"'></h3>";
                        session_destroy();
                    }
				
					
				  }
				
	     		}
                
		    }
				
	      }
			
	    }
	            else
					{
						buildPage("", "", "");
					}
     }

	
    else
	{
		echo "div class='nologin'>You must logged in to see this page</div>";
	}

	

function buildPage($o,$n,$c)
{
       echo " <body>
           <section>
           <form action = 'changePass.php' method = 'post'>
   
		  
           <h2>Change Password</h2>
		   <div class='form-box'>
		   <div class='form-value'>
		   
		    <div class='inputbox'>
		   <input type = 'password' name = 'oldPass' id = 'oldPass' required  autocomplete = 'off' value = $o >
           <label for 'oldPass'>Old Password</label>
           
		   </div>
		    <div class='inputbox'>
			<input type = 'password' name = 'newPass' id = 'newPass' required value = $n >
           <label for 'newPass'>New Password </label>
		 
		   </div>
		   <div class='inputbox'>
		   <input type = 'password' name = 'confirmPass'  id = 'confirmPass' required value = $c>
           <label for 'confirmPass'>Confirm New Password</label>
		   
		   </div>
		   
           <button type='Submit'>Submit!</button>
		   </div>
		   </div>
		   </section>
           </form>
		   </body>";

}

mysqli_close($con);
?>