<?php

session_start();
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['username']);
	session_destroy();
    header('location: Login.php');
}

if(isset ($_SESSION['username']) && !empty($_SESSION['username'])){
	echo 'Session set';
}
else
{ 
$error='Please sign in before making any changes';
include 'error.html.php';
exit();}

include_once 'pdo_conn.php';
try
{
  $sql = 'SELECT max(M_REQUEST_ID)+1 as cnt FROM maintenance';
  $result = $pdo->query($sql);
  }
catch (PDOException $e)
{
  $error = 'Error fetching data: ' . $e->getMessage();
  include 'error.html.php';
  exit();
}
if (isset($_POST['PROBLEM'])) {
	   $sql='INSERT INTO Maintenance SET	   
                            Asset_Number=:asset_number,
                            REQ_RAISING_EMP_NO='.$_SESSION['empid'].',
                            CURRENT_STATUS=\'O\',
							PROBLEM_DESC=:PROBLEM,
							PROBLEM_TYPE=:PROBLEM_TYPE,
							Maintenance_Date=CURRENT_DATE';
                        $stmt=$pdo->prepare($sql);
                        $stmt->bindValue(':asset_number',$_POST['asset_number']);
                        $stmt->bindValue(':PROBLEM',$_POST['PROBLEM']);
                        $stmt->bindValue(':PROBLEM_TYPE',$_POST['PROBLEM_TYPE']);
                        $stmt->execute();
                        header('location: EmpHome.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Emp Raise Request</title>
    <link href="https://fonts.googleapis.com/css?family=Germania+One|Roboto:700" rel="stylesheet">
    <link rel="stylesheet" href="Admin Website.css">
</head>
<body>
    <header>
        
        <span id="logo">
            <H1>IT Asset Management</H1>

        </span>
       
    </header>

    <form method ="post" action = "?">
    
    <nav style ="text-align: left; background: #eeeeee; box-shadow: 6px 7px 53px -10px rgba(0,0,0,0.44);height: 730px; width: 190px; margin-top: 0px;">
        <ul>
            <li><a href="EmpHome.php">Home</a></li>
            <li><a href="Login.php?action=logout">Logout</a></li>

        </ul>  
    </nav>  
    <main style="margin-left: 265px; margin-top: 18px; margin-right: 20px; padding: 232px 40px; background-color: #F1F1F1">
        <br/>
        
        
        <br/> <br/>
         <div style = "margin-top: -230px;">
                    <span style="font-size: 28px; margin-left: 480px; color: grey"> Maintenance Request </span>
            
       
        <br/><br/><br/><br/><br/>
        
        <span style="font-size: 20px; margin-left: 290px; color: grey"> Request No.: </span>
        <!---->
        <textarea name = "req_id" style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5" readonly><?php foreach ($result as $result1): 
		echo $result1['cnt']; 
		endforeach;?></textarea>
        <br/><br/><br/>
        <span style="font-size: 20px; margin-left: 290px; color: grey"> Asset Name: </span>   
        <!-- WILL APPEAR AUTOMATICALLY--> 
        <textarea name = "asset_name" style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5" readonly><?php echo $_GET['assetname']?></textarea>
        <br/><br/><br/>
		<input type="hidden" name="asset_number" <?php echo "value=\"".$_GET['assetnumber']."\""?>>
        <span style="font-size: 20px; margin-left: 273px; color: grey"> Problem Type: </span>
        
       <select name = "PROBLEM_TYPE">
            <option value = ""> Select type </option>
            <option value = "HW"> Hardware </option>
            <option value = "SW"> Software </option>
        </select> 

        
        <br/> <br/><br/>
        <span style="font-size: 20px; margin-left: 315px; color: grey"> Problem: </span><br/>
        <textarea name = "PROBLEM" style="width: 370px; height: 110px; margin-left: 395px; background-color: #E5E5E5"></textarea>
     
        <br/> <br/><br/>
        
        <span style ="top: -10px; margin-left: 645px">
            <input type="submit"; id = "RequestMaintenance"; value="Request Maintenance">
        </span>

    </div>
        
</main>
</form>
   
</body>
</html>
