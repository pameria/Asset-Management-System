<?php

session_start();
include_once 'pdo_conn.php';

if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['username']);
    header('location: Login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Delete Asset</title>
    <link href="https://fonts.googleapis.com/css?family=Germania+One|Roboto:700" rel="stylesheet">
    <link rel="stylesheet" href="Admin Website.css">
</head>
<body>
    <header>
        
        <span id="logo">
            <H1>IT Asset Management</H1>

        </span>
       
    </header>
    
    <form method="post" action="deleteAsset_parul.php">

    <nav style ="text-align: left; background: #eeeeee; box-shadow: 6px 7px 53px -10px rgba(0,0,0,0.44);height: 745px; width: 190px; margin-top: 15px;">
        <ul>
            
            <li><a href="AdminAddAsset.php">Add Asset</a></li>
            <li><a href="AdminAssignAsset.php">Assign Asset</a></li>
            <li><a href="AdminUnassignAsset.php">Unassign Asset</a></li>
            <li><a href="Maintenance.php">Maintenance</a></li>
            <li><a href="Login.php?action=logout">Logout</a></li>

        </ul>  
    </nav>  
    <main style="margin-left: 265px; margin-top: 18px; margin-right: 20px; padding: 232px 40px; background-color: #F1F1F1">
        <br/>
        <p style="font-size: 23px; margin-left: 1000px; color: grey; margin-top: -222px; font-style: italic";> Admin </p>
        
        <br/> <br/>
         <div style = "margin-top: -40px;">
                     <!--<span style="font-size: 28px; margin-left: 480px; color: grey"> Delete Asset </span>
            
       
        <br/><br/><br/><br/><br/>
        

       <span style="font-size: 20px; margin-left: 290px; color: grey"> Asset Type: </span>
        
       <select name = "ASSET_TYPE">
            <option value = ""> Select type </option>
            <option value = "HW"> Hardware </option>
            <option value = "SW"> Software </option>
        </select> <br/><br/><br/> !-->


        <span style="font-size: 20px; margin-left: 230px; color: grey"> Asset Name: </span>
        <?php 
		$sql = "SELECT ASSET_NAME FROM asset where CURRENT_STATUS='A'";
 
          $result = $pdo->query($sql);
        while ($rows = $result -> fetch()) {
            $values[] = $rows['ASSET_NAME'];
        }
 
        ?>
        
        <select name = "ASSET_NAME">
            <option value = ""> Select an asset </option>
            <?php foreach($values as $ASSET_NAME): ?>
                <option value = "<?php echo $ASSET_NAME; ?>"><?php echo $ASSET_NAME; ?> </option>
            <?php endforeach; ?>
        </select>
        <br /> <br /><br/>
		<span style="font-size: 20px; margin-left: 230px; color: grey"> Employee Name: </span>
		<textarea name = "EMP_NAME" style="width: 120px; height: 20px; margin-left: 10px; background-color: #E5E5E5"></textarea>

        <!--<span style="font-size: 20px; margin-left: 280px; color: grey"> Asset Name: </span> 
        <select name = "ASSET_NAME">
            <option value = ""> Select an asset </option>
            
        </select> !-->
		
        
        <br/> <br/><br/>
        <span style="font-size: 20px; margin-left: 230px; color: grey"> Reason: </span>
        <textarea name = "ASSET_REASON" style="width: 130px; height: 50px; margin-left: 80px; background-color: #E5E5E5"></textarea>
     
        <br/> <br/><br/>
        
        <span style ="top: -10px; margin-left: 385px">
            <input type="submit"; id = "DeleteAsset" ; value="Delete Asset">
        </span>

    </div>

   
        
</main>
   
</body>
</html>
