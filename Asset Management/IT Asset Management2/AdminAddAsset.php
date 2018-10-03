<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Add Asset</title>
    <link href="https://fonts.googleapis.com/css?family=Germania+One|Roboto:700" rel="stylesheet">
    <link rel="stylesheet" href="Admin Website.css">
</head>
<body>
    <header>
        
        <span id="logo">
            <H1>IT Asset Management</H1>

        </span>
       
    </header>
	<form method="post" action="insertAsset.php">
    <nav style ="text-align: left; background: #eeeeee; box-shadow: 6px 7px 53px -10px rgba(0,0,0,0.44);height: 935px; width: 190px; margin-top: 15px;">
        <ul>
            
            <li><a href="AdminDeleteAsset.php">Delete Asset</a></li>
            <li><a href="AdminAssignAsset.php">Assign Asset</a></li>
            <li><a href="AdminUnassignAsset.php">Unassign Asset</a></li> 
            <li><a href="Maintenance.php">Maintenance</a></li>
            <li><a href="">Logout</a></li>

        </ul>  
    </nav>  
    <main style="margin-left: 265px; margin-top: 18px; margin-right: 20px; padding: 290px 40px; background-color: #F1F1F1">
        <br/>
        <p style="font-size: 23px; margin-left: 1000px; color: grey; margin-top: -280px; font-style: italic";> Admin </p>
        
        <br/> <br/>
         <div style = "margin-top: -40px;">
                    <span style="font-size: 28px; margin-left: 490px; color: grey">  Add Asset </span>
            
       
        <br/><br/><br/><br/><br/>
        
        
        <span style="font-size: 20px; margin-left: 300px; color: grey"> Asset ID: </span>
        <textarea name="ASSET_NUMBER" style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5" ></textarea>
        <br/> <br/></br/>
        
         <span style="font-size: 20px; margin-left: 280px; color: grey"> Asset Type: </span>
        <select name = "ASSET_TYPE">
            <option value = ""> Select type </option>
            <option value = "HW"> Hardware (Hw) </option>
            <option value = "SW"> Software (Sw) </option>
        </select>

         <br/> <br/></br/>
        <span style="font-size: 20px; margin-left: 220px; color: grey"> Asset Subcategory: </span>
        <select name = "ASSET_SUBCATEGORY">
            <option value = ""> Select an asset </option>
            <option value = "laptop"> laptop </option>
			<option value = "mouse"> mouse </option>
			<option value = "flashdrive"> flash drive </option>
            <option value = "keyboard"> keyboard </option>
            <option value = "cd"> CD </option>
            <option value = "deskmonitor"> desk monitor </option>
            <option value = "cellphone"> cell phone </option>
            <option value = "deskphone"> desk phone </option>
            <option value = "microsoft installation"> microsoft installation </option>
            <option value = "printersoftware"> printer software </option>
            <option value = "xamppinstallation"> xampp installation </option>
            <option value = "windowsinstallation"> windows 10 installation </option>
            <option value = "">  </option>

        </select>
        <br /> <br /><br/>

        <span style="font-size: 20px; margin-left: 270px; color: grey"> Asset Name: </span>
        <textarea name="ASSET_NAME" style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5" placeholder="Format: Type Subcategory Number. Ex: Hwlaptop1"></textarea>
       
        <br/> <br/><br/>
        <span style="font-size: 20px; margin-left: 330px; color: grey"> Cost: </span>
        <textarea name="ASSET_COST" style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5"></textarea>
        <br/> <br/><br/>
       <span style="font-size: 20px; margin-left: 270px; color: grey"> Description: </span><br/>
        <textarea  name="asset_description" style="width: 370px; height: 110px; margin-left: 385px; background-color: #E5E5E5"></textarea>
        <br/><br/>
        <span style ="top: -20px; margin-left: 693px">
            <input type="submit"; id = "AddAsset"; value="Add Asset";>
			
		</span>

    </div>
        
</main>
  </form> 
</body>
</html>
