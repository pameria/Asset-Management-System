
<?php
session_start();
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['username']);
	session_destroy();
    header('location: Login.php');
}

if(isset ($_SESSION['username']) && !empty($_SESSION['username'])){
	echo 'Session set';
	echo $_SESSION['empid']; 
} 
else
{ 
$error='Please sign in before making any changes';
include 'error.html.php';
exit();}
include_once 'pdo_conn.php';
try
{
  $sql = 'SELECT ast.asset_number,asset_name,asset_type,asset_subcategory,allotment_date 
  FROM assign A
  inner join asset ast
  ON ast.Asset_Number=A.Asset_number
  where emp_number ='.$_SESSION['empid'];
  $result = $pdo->query($sql);
  $sql = 'SELECT M_REQUEST_ID,A.asset_name,Problem_Type,
(case WHEN M.current_Status=\'O\' then \'Open\' WHEN M.CURRENT_STATUS=\'W\' then \'Work in Progress\' when M.CURRENT_STATUS=\'P\' then \'Pending Verification\' when M.CURRENT_STATUS=\'R\' then \'Reopen\' else \'Closed\' end) CURRENT_STATUS
FROM Maintenance M inner join asset A 
on M.Asset_Number=A.Asset_number 
where M.current_status in(\'O\',\'W\',\'P\',\'R\') and Req_raising_emp_no ='.$_SESSION['empid'];
$result_req = $pdo->query($sql);
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
    <title>Employee Home</title>
    <link href="https://fonts.googleapis.com/css?family=Germania+One|Roboto:700" rel="stylesheet">
    <link rel="stylesheet" href="Admin Website.css">

    <style>
    table {
        border-collapse: collapse; margin-top: 30px; margin-left: 30px;
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
    
    <nav style ="text-align: left; background: #eeeeee; box-shadow: 6px 7px 53px -10px rgba(0,0,0,0.44);height: 678px; width: 190px; margin-top: 15px;">
        <ul>

            <li><a href="Login.php?action=logout">Logout</a></li>

        </ul>  
    </nav>  
    <main style="margin-left: 265px; margin-top: 18px; margin-right: 20px; padding: 333px 40px; background-color: #F1F1F1">
        <br/>
        <p style="font-size: 23px; margin-left: 900px; color: grey; margin-top: -325px; font-style: italic";> Welcome <?php echo $_SESSION['username']?>! </p>
        <br/> <br/><br/><br/>
         <div style = "margin-top: -40px;">
            <span style="font-size: 25px; margin-left: 475px; color: grey">  My Assets </span>
            <table>
                <tr>
                     <th>Asset ID</th>
                     <th>Asset Type</th>
                     <th>Asset Subcategory</th>
                     <th>Asset Name</th>
                     <th>Description</th>
                     <th>Assignment Date</th>
                </tr>
            <?php foreach ($result as $result1): ?>
			<tr>
				<td> <?php echo $result1['asset_number']; ?> </td>
				<td> <?php echo $result1['asset_type']; ?> </td>
				<td> <?php echo $result1['asset_subcategory']; ?> </td>
				<td> <?php echo"<a href=\"EmpRaiseRequest.php?assetname=".$result1['asset_name']."&assetnumber=".$result1['asset_number']."\">".$result1['asset_name']."</a>"; ?> </td>
				<td> hellooooo</td>
				<td> <?php echo $result1['allotment_date']; ?> </td>
			</tr>
			<?php endforeach; ?>
            </table>
            <!--
            <div style="margin-top: -90px; margin-left: 950px"><input type="submit"; id = "RaiseRequest1"; onclick="location.href = 'EmpRaiseRequest.php'" ; value="Request Maintenance"></div>

            <div style="margin-top: 30px; margin-left: 950px"><input type="submit"; id = "RaiseRequest2"; onclick="location.href = 'EmpRaiseRequest.php'" ; value="Request Maintenance"></div>  -->

             <br/><br/><br/><br/>

            <span style="font-size: 25px; margin-left: 465px; color: grey">  My Requests </span>
            <table>
                <tr>
                     <th>Request ID</th>
                     <th>Asset Name</th>
                     <th>Type of Problem</th>
                     <th>Status</th>
                     
                </tr>
             <?php foreach ($result_req as $result_req1): ?>
			<tr>
				<td> <?php echo"<a href=\"request_work.php?req_id=".$result_req1['M_REQUEST_ID']."\">"."REQUEST#".$result_req1['M_REQUEST_ID']."</a>"; ?> </td>
				<td> <?php echo $result_req1['asset_name']; ?> </td>
				<td> <?php echo $result_req1['Problem_Type']; ?> </td>
				<td> <?php echo $result_req1['CURRENT_STATUS']; ?> </td>
			</tr>
			<?php endforeach; ?>
            </table>

        
</main>
   
</body>
</html>
