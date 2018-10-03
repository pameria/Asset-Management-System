<?php
session_start();
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['username']);
	session_destroy();
    header('location: Login.php');
}

if(isset ($_SESSION['username']) && !empty($_SESSION['username'])){
	echo 'Session set'."\n";
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
if($_POST['button'] == 'Update'){
	echo $_POST['button'];
	   $sql='INSERT INTO Maintenance_Comment SET	   
                            M_REQUEST_ID=:request_number,
                            Comments=:Comment,
							Commented_by='.$_SESSION['empid'].',
							Comment_Date=CURRENT_DATE';
                        $stmt=$pdo->prepare($sql);
                        $stmt->bindValue(':request_number',$_POST['req_id']);
                        $stmt->bindValue(':Comment',$_POST['comments']);
                        $stmt->execute();
                        header('location: Maintenance.php');
}
else{
	   $sql='INSERT INTO Maintenance_Comment SET	   
                            M_REQUEST_ID=:request_number,
                            Comments=:Comment,
                            Commented_by='.$_SESSION['empid'].',
							Comment_Date=CURRENT_DATE';
                        $stmt=$pdo->prepare($sql);
                        $stmt->bindValue(':request_number',$_POST['req_id']);
                        $stmt->bindValue(':Comment',$_POST['comments']);
                        $stmt->execute();
		if($_POST['button'] == 'Resolve') {
						$sql='Update Maintenance SET CURRENT_STATUS=\'P\' where M_REQUEST_ID='.$_POST['req_id'];
						echo $sql;
		}
		if($_POST['button'] == 'Verify') {
						$sql='Update Maintenance SET CURRENT_STATUS=\'C\' where M_REQUEST_ID='.$_POST['req_id'];
						echo $sql;
		}
		if($_POST['button'] == 'Reopen') {
						$sql='Update Maintenance SET CURRENT_STATUS=\'R\' where M_REQUEST_ID='.$_POST['req_id'];
						echo $sql;
		}
		$pdo->query($sql);
		}
}
catch (PDOException $e)
{
  echo "In Catch"; 	
  $error = 'Error fetching data: '.$e->getMessage();
  include 'error.html.php';
  exit(); 
}
if ($_SESSION['role'] == 'ADM') {
header('location: Maintenance.php');
}
else
{
	header('location: EmpHome.php');
}
?>