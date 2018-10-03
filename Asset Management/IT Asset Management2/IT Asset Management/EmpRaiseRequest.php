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
    
    <nav style ="text-align: left; background: #eeeeee; box-shadow: 6px 7px 53px -10px rgba(0,0,0,0.44);height: 730px; width: 190px; margin-top: 15px;">
        <ul>
            <li><a href="EmpHome.php">Home</a></li>
            <li><a href="">Logout</a></li>

        </ul>  
    </nav>  
    <main style="margin-left: 265px; margin-top: 18px; margin-right: 20px; padding: 232px 40px; background-color: #F1F1F1">
        <br/>
        
        
        <br/> <br/>
         <div style = "margin-top: -230px;">
                    <span style="font-size: 28px; margin-left: 480px; color: grey"> Maintenance Request </span>
            
       
        <br/><br/><br/><br/><br/>
        
        <span style="font-size: 20px; margin-left: 290px; color: grey"> Request No.: </span>
        <!--
        <textarea style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5"></textarea> -->
        <br/><br/><br/>
        <span style="font-size: 20px; margin-left: 290px; color: grey"> Asset Name: </span>   
        <!-- WILL APPEAR AUTOMATICALLY 
        <textarea style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5"></textarea> -->
        <br/><br/><br/>
        <span style="font-size: 20px; margin-left: 273px; color: grey"> Problem Type: </span>
        
       <select name = "AssetType">
            <option value = ""> Select type </option>
            <option value = "HW"> Hardware </option>
            <option value = "SW"> Software </option>
        </select> 

        
        <br/> <br/><br/>
        <span style="font-size: 20px; margin-left: 315px; color: grey"> Problem: </span><br/>
        <textarea style="width: 370px; height: 110px; margin-left: 395px; background-color: #E5E5E5"></textarea>
     
        <br/> <br/><br/>
        
        <span style ="top: -10px; margin-left: 645px">
            <input type="submit"; id = "RequestMaintenance"; onclick="alert('Maintenance has been requested.')" ; value="Request Maintenance">
        </span>

    </div>
        
</main>
   
</body>
</html>
