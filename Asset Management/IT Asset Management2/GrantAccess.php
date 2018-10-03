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
  $sql = 'SELECT Employee_Number,username,EMP_NAME FROM login L
  inner join employee E
  on L.Employee_Number=E.EMP_NUMBER
  where L.role=\'ADM\' and Access_Flg=\'N\'';
  $result = $pdo->query($sql);
  $resultjs = $pdo->query($sql);
 
}
catch (PDOException $e)
{
  $error = 'Error fetching data: ' . $e->getMessage();
  include 'error.html.php';
  exit();
}
if(isset($_POST['EMP_NUMBER']))
{
  $sql = 'update login set ACCESS_FLG=\'Y\' where username=\''.$_POST['EMP_NAME'].'\'';
  $pdo->query($sql);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Grant Access</title>
    <link href="https://fonts.googleapis.com/css?family=Germania+One|Roboto:700" rel="stylesheet">
    <link rel="stylesheet" href="Admin Website.css">
</head>
<body>
    <header>
        
        <span id="logo">
            <H1>IT Asset Management</H1>

        </span>
       
    </header>
	<form method="post" action="?">
    <nav style ="text-align: left; background: #eeeeee; box-shadow: 6px 7px 53px -10px rgba(0,0,0,0.44);height: 935px; width: 190px; margin-top: 15px;">
        <ul>
            
			<li><a href="AdminDeleteAsset.php">Add Asset</a></li>
            <li><a href="AdminDeleteAsset.php">Delete Asset</a></li>
            <li><a href="AdminAssignAsset.php">Assign Asset</a></li>
            <li><a href="AdminUnassignAsset.php">Unassign Asset</a></li> 
            <li><a href="Maintenance.php">Maintenance</a></li>
            <li><a href="?action=logout">Logout</a></li>

        </ul>  
    </nav>  
    <main style="margin-left: 265px; margin-top: 18px; margin-right: 20px; padding: 290px 40px; background-color: #F1F1F1">
	<script type="text/javascript">
		function updateText(type) { 
		var val = document.getElementById(type).value;
		var val1=""
		<?php foreach ($resultjs as $result2): ?>
		if(val==<?php echo $result2['Employee_Number'];?>)
		{
			val1="<?php echo $result2['username'];?>"
		}
		<?php endforeach?>
		id="emp_name"
		document.getElementById(id).value = val1;
		}
	</script>
        <br/>
        <p style="font-size: 23px; margin-left: 900px; color: grey; margin-top: -280px; font-style: italic";> Admin </p>
        
        <br/> <br/>
         <div style = "margin-top: -40px;">
                    <span style="font-size: 28px; margin-left: 490px; color: grey">  Grant Access </span>
            
       
        <br/><br/><br/><br/><br/>
        
        
        <!--<span style="font-size: 20px; margin-left: 300px; color: grey"> Employee Id: </span>
        <textarea name="EMP_NUMBER" style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5" ></textarea>
        <br/> <br/></br/>-->
        
         <span style="font-size: 20px; margin-left: 280px; color: grey"> Employee Name: </span>
        <select name = "EMP_NUMBER" id="EMPL" onchange="updateText('EMPL')">
            <option value = ""> Select Employee </option>
            <?php foreach ($result as $result1): ?>
			<option value = <?php echo $result1['Employee_Number'] ?>> <?php echo $result1['EMP_NAME'] ?> </option>
            <?php endforeach?>
        </select>

       <!-- <span style="font-size: 20px; margin-left: 220px; color: grey"> Asset Subcategory: </span>
        <select name = "ASSET_SUBCATEGORY">
            <option value = "ABC"> ABC </option>
			<option value = "DEF"> DEF </option>
			<option value = "XYZ"> XYZ </option>
        </select> -->
        <br /> <br /><br/>

        <span style="font-size: 20px; margin-left: 278px; color: grey"> User Name: </span>
        <textarea name="EMP_NAME" id="emp_name" style="width: 370px; height: 20px; margin-left: 20px; background-color: #E5E5E5" readonly></textarea>
       
        <br/> <br/><br/>
        
        <span style ="top: -20px; margin-left: 693px">
            <input type="submit"; id = "grantaccess"; value="Grant Access";>
			
		</span>

    </div>
        
</main>
  </form> 
</body>
</html>
