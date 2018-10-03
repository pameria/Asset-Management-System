<?php

session_start();
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['username']);
	session_destroy();
    header('location: Login.php');
}

if(isset ($_SESSION['username']) && !empty($_SESSION['username'])){
	//echo 'Session set';
}
else
{ 
$error='Please sign in before making any changes';
include 'error.html.php';
exit();}
include_once 'pdo_conn.php';
try
{
  $sql = 'Select * from asset where current_status=\'N\'';
  $resultas = $pdo->query($sql); 
  $sql = 'Select * from employee where end_date is NULL';
  $resultem = $pdo->query($sql); 

  }
catch (PDOException $e)
{
  $error = 'Error fetching data: ' . $e->getMessage();
  include 'error.html.php';
  exit();
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Assign Asset</title>
    <link href="https://fonts.googleapis.com/css?family=Germania+One|Roboto:700" rel="stylesheet">
    <link rel="stylesheet" href="Admin Website.css">
</head>
<body>
    <header>
        
        <span id="logo">
            <H1>IT Asset Management</H1>

        </span>
       
    </header>

    <form method = "post" action = "assignAsset.php">
    
    <nav style ="text-align: left; background: #eeeeee; box-shadow: 6px 7px 53px -10px rgba(0,0,0,0.44);height: 770px; width: 190px; margin-top: 0px;">
        <ul>
            <li><a href="AdminAddAsset.php">Add Asset</a></li>
            <li><a href="AdminDeleteAsset.php">Delete Asset</a></li>
            <li><a href="AdminUnassignAsset.php">Unassign Asset</a></li>
            <li><a href="Maintenance.php">Maintenance</a></li>
            <li><a href="Login.php?action=logout">Logout</a></li>

        </ul>  
    </nav>  
    <main style="margin-left: 265px; margin-top: 18px; margin-right: 20px; padding: 300px 40px; background-color: #F1F1F1">

         <br/>
        <p style="font-size: 23px; margin-left: 1000px; color: grey; margin-top: -290px; font-style: italic";> Admin </p>
        
        <br/> <br/>
         <div style = "margin-top: -40px;">
                    <span style="font-size: 28px; margin-left: 475px; color: grey">  Assign Asset </span>
            
       
        <br/><br/><br/><br/><br/>


         <span style="font-size: 20px; margin-left: 450px; color: grey"> Asset: </span>
        <select name = "asset_num">
            <option value = ""> Select Asset </option>
            <?php foreach ($resultas as $result1): ?>
			<option value = <?php echo $result1['ASSET_NUMBER'] ?>> <?php echo $result1['ASSET_NAME'] ?> </option>
            <?php endforeach?>
        </select>
        <br/><br/><br/>
         <span style="font-size: 20px; margin-left: 410px; color: grey"> Employee: </span>
        <select name = "empl">
            <option value = ""> Select employee </option>
            <?php foreach ($resultem as $result2): ?>
			<option value = <?php echo $result2['EMP_NUMBER'] ?>> <?php echo $result2['EMP_NAME'] ?> </option>
            <?php endforeach?>
        </select>

         <br/><br/><br/>
        
        
        <span style ="top: -20px; margin-left: 500px">
            <input type="submit"; id = "AssignAsset"; value="Assign Asset">
        </span>

    


    </div>
        
</main>
</form>
   
</body>
</html>
