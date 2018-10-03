<div style = "color: red; font-size: 1.3em; font-weight: bold">
 <?php

?> </div>

        <div style = "color: green; font-size: 1.3em; font-weight: bold">
<?php

             
?> </div>


<?php



        
		include_once 'pdo_conn.php';
		$sql='update asset set current_status=\'N\' where ASSET_NUMBER=:ASSET_NUMBER';
		$stmt=$pdo->prepare($sql);
		$stmt->bindValue(':ASSET_NUMBER',$_GET['assetnumber']);
		//echo $sql;
		$result_unassign=$stmt->execute();
		$sql2='Update assign set RETURNING_DATE= current_date where ASSET_NUMBER=:ASSET_NUMBER and RETURNING_DATE is NULL';
		$stmt=$pdo->prepare($sql2);
		$stmt->bindValue(':ASSET_NUMBER',$_GET['assetnumber']);
		$stmt->execute();
//		echo $sql2;
		header('location: AdminHome.php');
		echo "Asset successfully unassigned.";

 ?>