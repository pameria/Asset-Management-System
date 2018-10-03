<div style = "color: red; font-size: 1.3em; font-weight: bold">
 <?php

         if (empty ($_POST['asset_num'])) {
                echo "* Enter an asset number.<br>";
        } 
        if (empty ($_POST['empl'])) {
                echo "* Enter an employee id.<br>";
        } 
	

?> </div>

        <div style = "color: green; font-size: 1.3em; font-weight: bold">
<?php
        if (empty ($_POST['asset_num']) && empty ($_POST['empl'])) {
            echo 'All fields are required.';
                
        } 

/*        if (!empty ($_POST['asset_num']) && !empty ($_POST['empl'])) {
            echo 'Asset was successfully assigned.';
                
        } */

             
?> </div>   



<?php
        
        //ADD ASSIGN ASSET CODE HERE
        include_once 'pdo_conn.php';
        try {
        if (isset($_POST['asset_num'])) {
       
            $sql4 = 'INSERT INTO assign SET
                ASSET_NUMBER=:ASSET_NUMBER,
                EMP_NUMBER=:EMP_NUMBER,
                ALLOTMENT_DATE = CURRENT_DATE,
                RETURNING_DATE= NULL';
//echo $sql4;      
      $statement = $pdo->prepare($sql4);
            $statement->bindValue(':ASSET_NUMBER',$_POST['asset_num']);
            $statement->bindValue(':EMP_NUMBER',$_POST['empl']);
            $statement->execute();
         $sql='UPDATE asset SET CURRENT_STATUS=\'A\' where ASSET_NUMBER='.$_POST['asset_num'];
//		echo $sql;
		$pdo->query($sql);
        echo "Asset is successfully assigned.";
		header('location: AdminHome.php');

         } 
     } catch (PDOException $e) {
        exit();
     } 
	



 ?>