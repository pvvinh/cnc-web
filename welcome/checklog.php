<?php 
	session_start();
	require_once("../incfiles/connect.php");
	$username = trim($_POST['username']);
    $password = trim($_POST['password']);
   
    
    
    if (!empty($username) && !empty($password))
    {
           
        $query = mysqli_query($conn,"select * from account where username = '".$username."' and password = '".$password."'");
        $num_rows = mysqli_num_rows($query);
        if ($num_rows==0)
            echo "Username or password not correct! Try again";
        else {
            $query = mysqli_query($conn,"select * from account where username = '".$username."' and password = '".$password."'");
            $_SESSION["username"] = $username;
          

            echo'<b>Succesful login. </b>';
            echo'<script type="text/javascript">
         
          window.location="/project/index.php";
        </script>';
        }

    }
    else
        echo'<b>Please enter username and password</b>';
?>