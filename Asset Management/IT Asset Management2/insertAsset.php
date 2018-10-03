<?php
				include_once 'pdo_conn.php';
				try{
					//var_dump(isset($_POST['ASSET_NUMBER']));
					echo "Asset is successfully added.";
						if (isset($_POST['ASSET_NUMBER'])){
						$sql='INSERT INTO asset (ASSET_NUMBER,ASSET_NAME,ASSET_TYPE,ASSET_SUBCATEGORY,ASSET_COST)
							Values(:ASSET_NUMBER,:ASSET_NAME,:ASSET_TYPE,:ASSET_SUBCATEGORY,:ASSET_COST)';
						$stmt=$pdo->prepare($sql);
						$stmt->bindValue(':ASSET_NUMBER',$_POST['ASSET_NUMBER']);
						$stmt->bindValue(':ASSET_TYPE',$_POST['ASSET_TYPE']);
						$stmt->bindValue(':ASSET_SUBCATEGORY',$_POST['ASSET_SUBCATEGORY']);
						$stmt->bindValue(':ASSET_NAME',$_POST['ASSET_NAME']);
						$stmt->bindValue(':ASSET_COST',$_POST['ASSET_COST']);
						//$stmt->bindValue(':asset_description',$_POST['asset_description']);
						$stmt->execute();
						$stmt=$pdo->prepare($sql);
						//$stmt->execute();
						}
				}
				catch (PDOException $e){
					$error = 'Error adding asset: ' . $e->getMessage();
					include 'error.html.php';
					exit();
				}
				
?>