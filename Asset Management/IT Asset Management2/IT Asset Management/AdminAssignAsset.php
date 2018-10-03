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
    
    <nav style ="text-align: left; background: #eeeeee; box-shadow: 6px 7px 53px -10px rgba(0,0,0,0.44);height: 770px; width: 190px; margin-top: 15px;">
        <ul>
            <li><a href="AdminAddAsset.php">Add Asset</a></li>
            <li><a href="AdminDeleteAsset.php">Delete Asset</a></li>
            <li><a href="AdminUnassignAsset.php">Unassign Asset</a></li>
            <li><a href="Maintenance.php">Maintenance</a></li>
            <li><a href="">Logout</a></li>

        </ul>  
    </nav>  
    <main style="margin-left: 265px; margin-top: 18px; margin-right: 20px; padding: 300px 40px; background-color: #F1F1F1">

         <br/>
        <p style="font-size: 23px; margin-left: 1000px; color: grey; margin-top: -290px; font-style: italic";> Admin </p>
        
        <br/> <br/>
         <div style = "margin-top: -40px;">
                    <span style="font-size: 28px; margin-left: 475px; color: grey">  Assign Asset </span>
            
       
        <br/><br/><br/><br/><br/>

        <span style="font-size: 20px; margin-left: 290px; color: grey"> Asset Type: </span>
        
       <select name = "AssetType">
            <option value = ""> Select type </option>
            <option value = "HW"> Hardware </option>
            <option value = "SW"> Software </option>
        </select> <br/><br/><br/>


        <span style="font-size: 20px; margin-left: 230px; color: grey"> Asset Subcategory: </span>
        <select name = "AssetSubcategory">
            <option value = ""> Select an asset </option>
        </select>
        <br /> <br /><br/>

        <span style="font-size: 20px; margin-left: 250px; color: grey"> Availabe Assets: </span> 
        <select name = "AssetName">
            <option value = ""> Select an asset </option>
            
        </select>
        
        <br/> <br/><br/>
        
        <span style="font-size: 20px; margin-left: 270px; color: grey"> Employee ID: </span>
        <textarea style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5"></textarea>
        <br/> <br/></br/>
        <span style="font-size: 20px; margin-left: 243px; color: grey"> Employee Name: </span>
        <!--
        <textarea style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5"></textarea> -->
        <br /> <br /><br/>
        
        
        <span style ="top: -20px; margin-left: 690px">
            <input type="submit"; id = "AssignAsset"; onclick="alert('Asset has been assigned.')" ; value="Assign Asset">
        </span>

    </div>
        
</main>
   
</body>
</html>
