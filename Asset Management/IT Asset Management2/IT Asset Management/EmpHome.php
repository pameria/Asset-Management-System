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
    
    <nav style ="text-align: left; background: #eeeeee; box-shadow: 6px 7px 53px -10px rgba(0,0,0,0.44);height: 890px; width: 190px; margin-top: 15px;">
        <ul>

            <li><a href="">Logout</a></li>

        </ul>  
    </nav>  
    <main style="margin-left: 265px; margin-top: 18px; margin-right: 20px; padding: 333px 40px; background-color: #F1F1F1">
        <br/>
        <p style="font-size: 23px; margin-left: 900px; color: grey; margin-top: -325px; font-style: italic";> Welcome (name)! </p>
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
                <tr>
                    <td></td>
                    <td></td>
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
                    <td></td>
                    <td></td>
                </tr>
            </table>
            
            <div style="margin-top: -90px; margin-left: 950px"><input type="submit"; id = "RaiseRequest1"; onclick="location.href = 'EmpRaiseRequest.php'" ; value="Request Maintenance"></div>

            <div style="margin-top: 30px; margin-left: 950px"><input type="submit"; id = "RaiseRequest2"; onclick="location.href = 'EmpRaiseRequest.php'" ; value="Request Maintenance"></div>

             <br/><br/><br/><br/>

            <span style="font-size: 25px; margin-left: 465px; color: grey">  My Requests </span>
            <table>
                <tr>
                     <th>Request ID</th>
                     <th>Asset Name</th>
                     <th>Type of Problem</th>
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

        
</main>
   
</body>
</html>
