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
    
    <nav style ="text-align: left; background: #eeeeee; box-shadow: 6px 7px 53px -10px rgba(0,0,0,0.44);height: 910px; width: 190px; margin-top: 15px;">
        <ul>
            <li><a href="AdminAddAsset.php">Add Asset</a></li>
            <li><a href="AdminDeleteAsset.php">Delete Asset</a></li>
            <li><a href="AdminAssignAsset.php">Assign Asset</a></li>
            <li><a href="AdminUnassignAsset.php">Unassign Asset</a></li> 
            <li><a href="">Logout</a></li>

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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
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
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>

                </tr>

                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>

            </table>
            <div style="margin-top: -90px; margin-left: 990px"><input type="submit"; id = "MaintainAccept1"; onclick="alert('Request has been accepted.')" ; value="Accept"></div>

            <div style="margin-top: 30px; margin-left: 990px"><input type="submit"; id = "MaintainAccept2"; onclick="alert('Request has been accepted.')" ; value="Accept"></div>

        
</main>
   
</body>
</html>
