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
  $sql = 'SELECT Case when CURRENT_STATUS=\'A\' then \'Assigned\' when CURRENT_STATUS=\'N\' then \'Available\'else \'Damaged\' end as Current_status,
  Count(*) as cnt FROM asset group by 1';
  $result = $pdo->query($sql);
 
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
    <title>Admin Home</title>
    <link href="https://fonts.googleapis.com/css?family=Germania+One|Roboto:700" rel="stylesheet">
    <link rel="stylesheet" href="Admin Website.css">
</head>
<body>
    <header>
        
        <span id="logo">
            <H1>IT Asset Management</H1>

        </span>
        
    </header>
	
    
    <nav style ="text-align: left; background: #eeeeee; box-shadow: 6px 7px 53px -10px rgba(0,0,0,0.44);height: 650px; width: 190px; margin-top: 15px;">
        <ul>
            <li><a href="AdminAddAsset.php">Add Asset</a></li>
            <li><a href="AdminDeleteAsset.php">Delete Asset</a></li>
            <li><a href="AdminAssignAsset_C.php">Assign Asset</a></li>
            <li><a href="AdminUnassignAsset.php">Unassign Asset</a></li> 
            <li><a href="Maintenance.php">Maintenance</a></li>
			<li><a href="GrantAccess.php">Grant Access</a></li>
            <li><a href="?action=logout">Logout</a></li>
</br>
			
			
        </ul>  
    </nav>  
    <main style="margin-left: 265px; margin-top: 18px; margin-right: 20px; padding: 333px 40px; background-color: #F1F1F1">
    	<br/>
		
    	<p style="font-size: 23px; margin-left: 870px; color: grey; margin-top: -310px; font-style: italic";> Welcome Admin! </p>
		<p style="font-size: 30px; margin-center: 1000px; color: grey; margin-top: 5px; font-style: italic";> Asset Current Status </p>
		<img src="asset2.jpg" alt="IT connecting world" align="right">	
		

		
    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      // Load the Visualization API and the corechart package.
      google.charts.load('current', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.charts.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

        // Create the data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Current_status');
        data.addColumn('number', 'Count');
    	
        data.addRows([<?php foreach ($result as $result1): ?>
						['<?php echo $result1['Current_status']?>', <?php echo $result1['cnt']?>],	
						<?php endforeach?>])	;
		  
//number(<?php echo $result1['cnt']?>
        // Set chart options
        var options = {'title':'Assets in Inventory',
                       'width':500,
                       'height':400};

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
 

  <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
	
	
        
</main>


  
  </body>
</html>
   
