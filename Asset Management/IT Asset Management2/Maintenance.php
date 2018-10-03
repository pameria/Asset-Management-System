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
exit();
}

include_once 'pdo_conn.php';
try
{
  $sql = 'SELECT M_REQUEST_ID,A.asset_name,Problem_Type,
(case WHEN M.current_Status=\'O\' then \'Open\' WHEN M.CURRENT_STATUS=\'W\' then \'Work in Progress\' when M.CURRENT_STATUS=\'P\' then \'Pending Verification\' when M.CURRENT_STATUS=\'R\' then \'Reopen\' else \'Closed\' end) CURRENT_STATUS
FROM Maintenance M inner join asset A 
on M.Asset_Number=A.Asset_number 
where M.current_status=\'O\'';
  $result = $pdo->query($sql);
}
catch (PDOException $e)
{
  $error = 'Error fetching data: ' . $e->getMessage();
  include 'error.html.php';
  exit();
  }
try
{
  $sql = 'SELECT M_REQUEST_ID,A.asset_name,Problem_Type,
(case WHEN M.current_Status=\'O\' then \'Open\' WHEN M.CURRENT_STATUS=\'W\' then \'Work in Progress\' when M.CURRENT_STATUS=\'P\' then \'Pending Verification\' when M.CURRENT_STATUS=\'R\' then \'Reopen\' else \'Closed\' end) CURRENT_STATUS
FROM Maintenance M inner join asset A 
on M.Asset_Number=A.Asset_number 
where M.current_status in (\'W\',\'R\') and WORKING_EMP_NO='.$_SESSION['empid'];
  $result_disp = $pdo->query($sql);
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
    <title>Maintenance</title>
    <link href="https://fonts.googleapis.com/css?family=Germania+One|Roboto:700" rel="stylesheet">
    <link rel="stylesheet" href="Admin Website.css">

    <style>
    table {
        border-collapse: collapse; margin-top: 30px; margin-left: 70px;
    }
    table, td, th {
        border: 2px solid grey; height: 50px; width: 900px; color: grey; font-size: 20px;
    }
    </style>
</head>

<body>
    <header>
        
        <span id="logo">
            <H1>IT Asset Management</H1>

        </span>
        
    </header>
    
    <nav style ="text-align: left; background: #eeeeee; box-shadow: 6px 7px 53px -10px rgba(0,0,0,0.44);height: 710px; width: 190px; margin-top: 15px;">
        <ul>
            <li><a href="AdminAddAsset.php">Add Asset</a></li>
            <li><a href="AdminDeleteAsset.php">Delete Asset</a></li>
            <li><a href="AdminAssignAsset.php">Assign Asset</a></li>
            <li><a href="AdminUnassignAsset.php">Unassign Asset</a></li> 
            <li><a href="Login.php?action=logout">Logout</a></li>

        </ul>  
    </nav>  
    <main style="margin-left: 265px; margin-top: 18px; margin-right: 20px; padding: 300px 40px; background-color: #F1F1F1">
    	 <br/>
        <p style="font-size: 23px; margin-left: 1000px; color: grey; margin-top: -290px; font-style: italic";> Admin </p>
        <br/><br/>

         <div style = "margin-top: -40px;">
                    <span style="font-size: 28px; margin-left: 460px; color: grey">  Maintenance </span>
            
       
        <br/><br/><br/><br/><br/><br/>

        <div style = "margin-top: -40px;">
            <span style="font-size: 25px; margin-left: 70px; color: grey">  Your Requests </span>
            <table>
                <tr>
                     <th>Request ID</th>
                     <th>Asset Name</th>
                     <th>Problem Type</th>
                     <th>Status</th>
                </tr>
             <?php foreach ($result_disp as $result1_disp): ?>
			<tr>
				<td> <?php echo"<a href=\"request_work.php?req_id=".$result1_disp['M_REQUEST_ID']."\">"."REQUEST#".$result1_disp['M_REQUEST_ID']."</a>"; ?> </td>
				<td> <?php echo $result1_disp['asset_name']; ?> </td>
				<td> <?php echo $result1_disp['Problem_Type']; ?> </td>
				<td> <?php echo $result1_disp['CURRENT_STATUS']; ?> </td>
			</tr>
			<?php endforeach; ?>
            </table>
            
       
        <br/><br/><br/><br/>

        <span style="font-size: 25px; margin-left: 70px; color: grey">  Open Requests </span>
            <table>
                <tr>
                     <th>Request ID</th>
                     <th>Asset Name</th>
                     <th>Problem Type</th>
                     <th>Status</th>
                </tr>
             <?php foreach ($result as $result1): ?>
			<tr>
				<td> <?php echo"<a href=\"request.php?req_id=".$result1['M_REQUEST_ID']."\">"."REQUEST#".$result1['M_REQUEST_ID']."</a>"; ?> </td>
				<td> <?php echo $result1['asset_name']; ?> </td>
				<td> <?php echo $result1['Problem_Type']; ?> </td>
				<td> <?php echo $result1['CURRENT_STATUS']; ?> </td>
			</tr>
			<?php endforeach; ?>
            </table>

        
</main>
   
</body>
</html>
