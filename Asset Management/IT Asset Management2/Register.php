
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css?family=Germania+One|Roboto:700" rel="stylesheet">
    <link rel="stylesheet" href="Admin Website.css">
</head>
<body>
    <header>
        
        <span id="logo">
            <H1>IT Asset Management</H1>

        </span>
        
    </header>
    
    <form method="post" action="registration.php">
     
    <main style="margin-left: 35px; margin-top: 25px; margin-right: 20px; padding: 220px 40px; background-color: #F1F1F1">
    	<br/><br/><br/><br>
    	 <div style = "margin-top: -240px;">
                    <span style="font-size: 28px; margin-left: 620px; color: grey"> Registration </span>
         </div>
        <br><br><br>
         <span style="font-size: 20px; margin-left: 390px; color: grey"> First Name: </span>
        <input type="text" name="FirstName" style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5; border: 2px solid grey"/>
        <br/> <br/></br/>

        <span style="font-size: 20px; margin-left: 390px; color: grey"> Last Name: </span>
        <input type="text" name="LastName" style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5; border: 2px solid grey"/>
        <br/> <br/></br/>

        <span style="font-size: 20px; margin-left: 370px; color: grey"> Emp Number: </span>
        <input type="text" name="emp_id" style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5; border: 2px solid grey"/>
        <br/> <br/></br/>

        <span style="font-size: 20px; margin-left: 440px; color: grey"> Role: </span>
        <select name = "LOGIN_TYPE">
            <option value = ""> Select a role </option>
            <option value = "EMP"> Employee </option>
            <option value = "ADM"> Admin </option>
        </select> 
        <br/> <br/></br/>

		
        <span style="font-size: 20px; margin-left: 395px; color: grey"> Username: </span>
        <input type="text" name="username" style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5; border: 2px solid grey"/>
        <br/> <br/></br/>

        <span style="font-size: 20px; margin-left: 400px; color: grey"> Password: </span>
        <input type = "password" name="password" style="width: 370px; height: 20px; margin-left: 10px; background-color: #E5E5E5; border: 2px solid grey"/>
        <br/> <br/><br>

        <span style ="top: -20px; margin-left: 660px">
            <input type="submit"; name = "REGISTER"; value="Register";> </span>

        
</main>
</form>
</body>
</html>

