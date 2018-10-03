<?php

 require 'pdo_conn.php';
 if (isset($_POST['REGISTER'])) {
	 if ($_POST['LOGIN_TYPE']=='EMP'){
		 $FLG='Y';
	 }
	 else{
		 $FLG='N';
	 }

   $sql='INSERT INTO login SET 
   							FirstName=:FirstName,
   							LastName=:LastName,
                            username=:username,
                            password=:password,
							employee_number=:emp_id,
							Role=:Role,
							Access_FLG=:FLG';
                          
                        $stmt=$pdo->prepare($sql);
                        $stmt->bindValue(':FirstName',$_POST['FirstName']);
                        $stmt->bindValue(':LastName',$_POST['LastName']);
                        $stmt->bindValue(':username',$_POST['username']);
                        $stmt->bindValue(':password', password_hash($_POST['password'], PASSWORD_BCRYPT));
						$stmt->bindValue(':emp_id', $_POST['emp_id']);
						$stmt->bindValue(':Role', $_POST['LOGIN_TYPE']);
						$stmt->bindValue(':FLG', $FLG);
                        $stmt->execute();
                        header('location: Login.php');

                        }


?>