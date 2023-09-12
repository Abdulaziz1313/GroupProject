<!-- Written by Abdulaziz Aloufi
	Student ID: C00266252
-->
<?php 
include 'dbase.inc.php';
echo '<link rel="stylesheet" href= "pass.css" type="text/css">';
session_start();

if (isset($_POST['loginName']) && isset($_POST['Password']))
{
    $attempts = $_SESSION['attempts'];

        $sql = "SELECT * FROM EmployTable WHERE loginName = '$_POST[loginName]' AND 
    Password = '$_POST[Password]'";


    if (!mysqli_query($con, $sql))
    echo "Error in query ". mysqli_error($con);
    else
    {
        if (mysqli_affected_rows($con) == 0)
        {
            $attempts++;

            if ($attempts <=3)
            {
                $_SESSION['attempts'] = $attempts;
                buildPage2($attempts);

               
            }
            else 
            {
                echo "<div class='errorstyle'>Sorry - You have used all 3 attempts<br>
                Shutting down...</div>";
            }
        }
        else
		{
              //Sucessful login
            $_SESSION['user'] = $_POST['loginName']; // Session Variable to keep track of the login name

          include 'Home.html';
        }
    }
}
else 
{
    // building page for initial display 
    $attempts = 1;
    $_SESSION['attempts'] = $attempts;
    buildPage2($attempts);
}

function buildPage2($att)
{
      echo " <body>
	
    <section>
	<form action = 'loginScreen.php' method = 'post'>
	<h2>Attempt Number: $att </h2>
    <div class='form-box'>
        <div class='form-value'>
     
                <h2>Login</h2>
                <div class='inputbox'>
               <ion-icon name='person-outline'></ion-icon>
                          <input type='text' name='loginName' id = 'loginName' required='loginName' autocomplete = 'off'/>
                    <label for='loginName'>Username</label>
                </div>
                <div class='inputbox'>
                    <ion-icon name='lock-closed-outline'></ion-icon>
                    <input type='password' name = 'Password' id = 'Password' required='Password'/>
                    <label for='password'>Password</label>
                </div>
                <button type='Submit'>Log in</button>
           
        </div>
    </div>
</section>
<script type='module' src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js'></script>
        <script nomodule src='https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js'></script>
 </form>
</body>";

	}

mysqli_close($con);
?>