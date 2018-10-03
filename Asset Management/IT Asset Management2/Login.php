<?php

  session_start();
  require 'pdo_conn.php';
  if (isset($_POST['LOGIN'])) {
    $stmt = $pdo -> prepare ('select * from login where username = :username');
    $stmt -> bindValue (':username', $_POST['username']);
    $stmt -> execute();
    $account = $stmt -> fetch(PDO::FETCH_OBJ);
    
    if ($account != NULL) {
        $matches = password_verify($_POST['password'], $account -> password);
		/*$hashAndSalt = password_hash($password, PASSWORD_BCRYPT);
		$matches=password_verify($password, $hashAndSalt);
		echo $matches;
		echo password_verify($_POST['password'], $account -> password);
		echo $_POST['username'];*/
        if ($matches) {
#			echo "here23";
			$empnbr= $account-> EMPLOYEE_NUMBER;
			$role=$account-> Role;
#			echo $empnbr;

			$_SESSION['username'] = $_POST['username'];
			$_SESSION['empid'] = $empnbr;
			$_SESSION['role'] = $role;
#			foreach ($stmt as $stmt1);
#			echo $account -> Role;#$stmt1['Role'];
#			echo $account -> Access_FLG;#echo $stmt1['Access_FLG'];			
            if(($account -> Role) == 'ADM' && ($account -> Access_FLG) == 'N') {
                header('location: AdminHome.php');
            } else {
                header('location: EmpHome.php');
            }
        } else {
            $error = 'Invalid Account. Try again.1';
        } 
       
    } else {
        $error = 'Invalid Account. Try again.2';
    }
}
     
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css?family=Germania+One|Roboto:700" rel="stylesheet">
    <link rel="stylesheet" href="Website.css">
</head>
<body>
	
    <header>
        <span id="logo">
            <H1>IT Asset Management</H1>
        </span>

        <form method = "post">
            

        <main style="background: url('https://i.pinimg.com/originals/6d/1c/d6/6d1cd626975e02da3d48d747099c517e.jpg'); margin-top: -30px; margin-left: -40px; margin-right: -40px">
            <br/> <br/> <br/> <br/> <br/> <br/><br/> <br/>

            <div style = "color: red; margin-left: 500px; font-weight: bold; font-size: 1.2em">
             <?php
               echo isset ($error) ? $error : '';
             ?>
            </div>

            <div id="login">
            	
            <p style="margin-top: 28px; margin-bottom: 25px; margin-right: 550px; margin-left: 180px; text-align: center; color: black"> Login </p>
            <label style="font-size: 20px; margin-left: 5px; color: black"> Username: </label>
            <input type ="text" style="width: 200px; height: 20px; margin-left: 10px; background-color: white; border: 2px solid black; font-size: 15px" name = "username"/>  
           
            <p><label style="font-size: 20px; margin-left: -12px; color: black"> Password: </label>
            <input type="password" style="width: 200px; height: 20px; margin-left: 10px; background-color: white; border: 2px solid black; font-size: 15px;" name = "password"/> </p> 
           

            <p style="margin-left: -5px"><a href = "Register.php" style = "color: black; font-size: 20px"> New user? Register here. </a></p>
              
                <p style="margin-left: -5px"><input type="submit"  name="LOGIN" value="Login"></p>
                </div>
            

            <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br /> <br />
        
          
    </main>
    </form>
   
</body>
</html>