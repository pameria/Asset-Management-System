<?php
session_start();
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['username']);
	session_destroy();
    header('location: Login.php');
}

if(isset ($_SESSION['username']) && !empty($_SESSION['username'])){
	echo 'Session set';
}
else
{ 
$error='Please sign in before making any changes';
include 'error.html.php';
exit();
}
include_once 'pdo_conn.php';
try
{
$empid=$_SESSION['empid'];
#echo $empid;
$sql='Update Maintenance SET Working_Emp_no='.$_SESSION['empid'].',CURRENT_STATUS=\'W\' where M_REQUEST_ID='.$_POST['req_id'];
$pdo->query($sql);
}
catch (PDOException $e)
{
  echo "In Catch"; 	
  $error = 'Error fetching data: '.$e->getMessage();
  include 'error.html.php';
  exit(); 
}
header('location: Maintenance.php');
?>