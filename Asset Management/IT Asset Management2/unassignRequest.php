
<?php
include_once 'pdo_conn.php';
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    unset($_SESSION['username']);
    header('location: Login.php');
	
}
	
	$sql1='select Asset_name,asset_number from asset where asset_number in (SELECT asset_number FROM assign where emp_number='.$_POST['empl'].')';
	$result=$pdo->query($sql1);	
	$sql3='select emp_name from employee where emp_number='.$_POST['empl'];
	$result3=$pdo->query($sql3);
	foreach ($result3 as $result_em);
?>
		<div style = "margin-top: 80px; margin-left: 350px">

        <span style="font-size: 20px; margin-left: 243px; color: grey"> Employee Name:   <?php echo $result_em['emp_name'] ?> </span>
		
		
<br /> <br /><br/>
        
		
       <span style="font-size: 25px; margin-left: 285px; color: grey"> Assigned Assets: </span>
       <br/><br/><br/>
       <div style = "margin-left: 280px">
            <table>
                <tr>
                     <th>Asset ID</th>
                     <th>Asset Name</th>
                     
                </tr>
             <?php foreach ($result as $result_req1): ?>
			<tr>
				<td> <?php echo $result_req1['asset_number']; ?> </td>
				<td> <?php echo"<a href=\"unassignAsset.php?assetnumber=".$result_req1['asset_number']."&assetname=".$result_req1['Asset_name']."\">".$result_req1['Asset_name']."</a>"; ?> </td>
			</tr>
			<?php endforeach; ?>
            </table>
        </div>

    </div>
        </div>
</main>
</form>
   
</body>
</html>
