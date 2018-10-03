<div style = "color: red; font-size: 1.3em; font-weight: bold">
 <?php

         if (empty ($_POST['ASSET_NUMBER'])) {
                echo "* Enter an asset number.<br>";
        } 
        if (empty ($_POST['EMP_NUMBER'])) {
                echo "* Enter an employee id.<br>";
        } 
        if (empty ($_POST['ALLOTMENT_DATE'])) {
                echo "* Enter the assignemnt date.<br>";
        }


         /* A SPECIFIC RETURNING DATE SHOULD NOT BE MADE REQUIRED FOR ASSIGN ASSET. THE ADMIN CAN ENTER IT IF THE RETURN DATE IS KNOWN AT THE TIME OF ASSIGNMENT. OTHERWISE, CURRENTLY NOT AVAILABLE SHOULD BE TYPED. THIS IS A REQUIRED FIELD.*/

        if (empty ($_POST['RETURNING_DATE'])) {
                 
                echo "* Enter a returning date OR type currently unavailable.<br>";

        }  


?> </div>

        <div style = "color: green; font-size: 1.3em; font-weight: bold">
<?php
        if (empty ($_POST['ASSET_NUMBER']) && empty ($_POST['EMP_NUMBER']) && empty ($_POST['ALLOTMENT_DATE']) && empty ($_POST['RETURNING_DATE'])) {
            echo 'All fields are required.';
                
        } 

        if (!empty ($_POST['ASSET_NUMBER']) && !empty ($_POST['EMP_NUMBER']) && !empty ($_POST['ALLOTMENT_DATE']) && !empty ($_POST['RETURNING_DATE'])) {
            echo 'Asset was successfully assigned.';
                
        } 

             
?> </div>   



<?php
        
        //ADD ASSIGN ASSET CODE HERE
        include_once 'pdo_conn.php';
        try {
        if (isset($_POST['ASSET_NUMBER'])) {
       
            $sql4 = 'INSERT INTO assign SET
                ASSET_NUMBER=:ASSET_NUMBER,
                EMP_NUMBER=:EMP_NUMBER,
                ALLOTMENT_DATE = :ALLOTMENT_DATE,
                RETURNING_DATE= :RETURNING_DATE';
            $statement = $pdo->prepare($sql4);
            $statement->bindValue(':ASSET_NUMBER',$_POST['ASSET_NUMBER']);
            $statement->bindValue(':EMP_NUMBER',$_POST['EMP_NUMBER']);
            $statement->bindValue(':ALLOTMENT_DATE',$_POST['ALLOTMENT_DATE']);
            $statement->bindValue(':RETURNING_DATE',$_POST['RETURNING_DATE']);
            $statement->execute();
            $statement = $pdo->prepare($sql4);
            $statement->execute();
         $sql='UPDATE asset SET CURRENT_STATUS="A" where ASSET_NUMBER=:ASSET_NUMBER';
		 $stmt=$pdo->prepare($sql);
		 $stmt->bindValue(':ASSET_NUMBER',$_POST['ASSET_NUMBER']);
		 $stmt->execute();


         } 
     } catch (PDOException $e) {
        exit();
     } 




 ?>