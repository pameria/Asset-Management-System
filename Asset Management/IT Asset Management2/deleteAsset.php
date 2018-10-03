<div style = "color: red; font-size: 1.3em; font-weight: bold">
 <?php
		session_start();
		include_once'pdo_conn.php';
       /* if (empty ($_POST['ASSET_TYPE'])) {
                echo "* Select an asset type.<br>";
        } 
        if (empty ($_POST['ASSET_SUBCATEGORY'])) {
                echo "* Select an asset subcategory.<br>";
        } */
        if (empty ($_POST['ASSET_NAME'])) {
                echo "* Select an asset.<br>";
        }
        if (empty ($_POST['ASSET_REASON'])) {
                echo "* Provide a reason.<br>";
        } 

?> </div>

        <div style = "color: green; font-size: 1.3em; font-weight: bold">
<?php 
        if (!empty ($_POST['ASSET_NAME']) && !empty ($_POST['ASSET_REASON'])) 
        {
                echo "Asset(s) has been successfully deleted.";
        } 

   
?> </div>



<?php



        //ADD DELETE ASSET CODE HERE
		
		/*DELIMITER $$
		CREATE TRIGGER `asset_before_delete` BEFORE DELETE ON `asset` FOR EACH ROW BEGIN

		declare v_deleted_by varchar(50);
		declare v_delete_comment varchar(5000);
		select User() into v_deleted_by;
		
  
		INSERT INTO deleted_assets
		( asset_number,
		deleted_by,
		deleted_date,
		delete_comment
		)
		VALUES
		( OLD.asset_number,
		v_deleted_by,
		SYSDATE(),
		NULL
          );

		END
		$$
		DELIMITER ; */
		$assetName=$_POST['ASSET_NAME'];
		$sql='SELECT ASSET_NUMBER from asset where ASSET_NAME=:ASSET_NAME';
		$stmt=$pdo->prepare($sql);
		$stmt->bindValue(':ASSET_NAME',$_POST['ASSET_NAME']);
		$result=$stmt->execute();
		echo $result;
		//$username=$_SESSION['username'];
		$sql='INSERT INTO deleted_assets SET
							ASSET_NUMBER=:ASSET_NUMBER,
							DELETED_BY=:DELETED_BY,
							DELETE_COMMENT=:DELETE_COMMENT,
							DELETED_DATE=CURDATE()';
						$stmt=$pdo->prepare($sql);
						$stmt->bindValue(':ASSET_NUMBER',$result); 
						$stmt->bindValue(':DELETED_BY',$_POST['EMP_NAME']);
						$stmt->bindValue(':DELETE_COMMENT',$_POST['ASSET_REASON']);
						$stmt->execute();
		$sql_up='UPDATE asset SET CURRENT_STATUS ="D" where ASSET_NUMBER =:ASSET_NUMBER';
		$stmt=$pdo->prepare($sql_up);
		$stmt->bindValue(':ASSET_NUMBER',$result);
		$stmt->execute();
		
?>

        