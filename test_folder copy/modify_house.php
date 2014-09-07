<!DOCTYPE html>
<html>
	<head>
    	<link type='text/css' rel='stylesheet' href='style.css'/>
    	<title>HouseManager: Welcome!</title>
  	</head>


  	<body>
  		<?php
  			function get_house_tenants($sql_hostname, $sql_username, $sql_password, $db_name, $house_id) {
  				// connect to mysql
                $dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

                // connect to DB
                if (!mysql_select_db($db_name, $dbhandle)) {
                    echo 'Could not select database';
                    exit;
                }

                $sql = "SELECT user_id FROM username_house WHERE house_id=" . $house_id;
                $result = mysql_query($sql);
                if (!$result) {
                    echo "DB Error, could not query the database\n";
                    echo 'MySQL Error: ' . mysql_error();
                    exit;
                }

                // Get tenant id's
                $tenant_id_array = array();
                while ($row = mysql_fetch_assoc($result)) {
                    array_push($tenant_id_array, (int)$row["user_id"]);
                }

                // Get tenant names
                $tenant_name_array = array();
                foreach ($tenant_id_array as $tenant_id) {
                	$sql = "SELECT username FROM user_login_table WHERE id=" . $tenant_id;
                	$result = mysql_query($sql);
                	$row = mysql_fetch_assoc($result);
                	array_push($tenant_name_array, $row["username"]);
                }

                return $tenant_name_array;
  			}

  			function get_house_tenants_ids($sql_hostname, $sql_username, $sql_password, $db_name, $house_id) {
  				// connect to mysql
                $dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

                // connect to DB
                if (!mysql_select_db($db_name, $dbhandle)) {
                    echo 'Could not select database';
                    exit;
                }

                $sql = "SELECT user_id FROM username_house WHERE house_id=" . $house_id;
                $result = mysql_query($sql);
                if (!$result) {
                    echo "DB Error, could not query the database\n";
                    echo 'MySQL Error: ' . mysql_error();
                    exit;
                }

                // Get tenant id's
                $tenant_id_array = array();
                while ($row = mysql_fetch_assoc($result)) {
                    array_push($tenant_id_array, (int)$row["user_id"]);
                }

                return $tenant_id_array;
                
  			}

  			function create_add_tenant_form($house_id){

                echo "<form method='post' action='add_tenant_submit.php'>";
				echo "<input type='text' name='username' value='' placeholder='new tenant name'>";
				echo "<input type='hidden' name='house_id' value=" . $house_id .">";
				echo "<input type='submit' name='commit' value='Add User'>";
				echo "</form>";


  			}

  			function delete_tenant_form($house_id){

 				echo "<form method='post' action='delete_tenant_submit.php'>";
				echo "<input type='text' name='username' value='' placeholder='old tenant name'>";
				echo "<input type='hidden' name='house_id' value=" . $house_id .">";
				echo "<input type='submit' name='commit' value='Remove User'>";
				echo "</form>";

  			}

  			function get_id_from_name($sql_hostname, $sql_username, $sql_password, $db_name, $username) {

				$dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

			    // connect to DB
			    if (!mysql_select_db($db_name, $dbhandle)) {
			        echo 'Could not select database';
			        exit;
			    }

			    // Check if user to delete-from-house exists
			    $sql = "SELECT id FROM user_login_table WHERE username='" . $username . "'";
			    $result = mysql_query($sql);
			    $num_results = mysql_num_rows($result);
			    if ($num_results == 0) {
			    	echo "User does not exist.<br>";
			    	exit;
			    }
			    else {
			    	$row = mysql_fetch_assoc($result);
			    	$user_id = (int)$row["id"];
			    }

			    return $user_id;
			}

  			function get_name_from_id($sql_hostname, $sql_username, $sql_password, $db_name, $to_find) {

				$dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

			    // connect to DB
			    if (!mysql_select_db($db_name, $dbhandle)) {
			        echo 'Could not select database';
			        exit;
			    }

			    $sql = "SELECT username FROM user_login_table WHERE id=" . $to_find;


            	$result = mysql_query($sql);
            	$row = mysql_fetch_assoc($result);
            	$name = $row["username"];

			    return $name;
  			}
			




			function get_owed_bills_payer_id($sql_hostname, $sql_username, $sql_password, $db_name, $user_id, $house_id){
				$dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

			    // connect to DB
			    if (!mysql_select_db($db_name, $dbhandle)) {
			        echo 'Could not select database';
			        exit;
			    }

			    $sql = "SELECT * FROM user_bills WHERE recipient_id=" . $user_id;

			    $result = mysql_query($sql);
			    $owed_to_user_by_payer_id = array();

			    while($row = mysql_fetch_assoc($result)) {
			    	array_push($owed_to_user_by_payer_id, (int)$row["payer_id"]);
			    }

			    return $owed_to_user_by_payer_id;
			}


			function get_owed_bills_by_id($sql_hostname, $sql_username, $sql_password, $db_name, $user_id, $house_id){

				$dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

			    // connect to DB
			    if (!mysql_select_db($db_name, $dbhandle)) {
			        echo 'Could not select database';
			        exit;
			    }

			    $sql = "SELECT * FROM user_bills WHERE recipient_id=" . $user_id;

			    $result = mysql_query($sql);
			    $bills_by_id = array();

			    while($row = mysql_fetch_assoc($result)){
			    	array_push($bills_by_id, (int)$row["bill_id"]);
			    }

			    return $bills_by_id;
			}


			function get_owed_bills_by_amount($sql_hostname, $sql_username, $sql_password, $db_name, $user_id, $house_id){

				$dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");
							    // connect to DB
			    if (!mysql_select_db($db_name, $dbhandle)) {
			        echo 'Could not select database';
			        exit;
			    }

			    $sql = "SELECT * FROM user_bills WHERE recipient_id=" . $user_id;


			    $result = mysql_query($sql);
			    $bills_by_amount = array();

			    while($row = mysql_fetch_assoc($result)){
			    	array_push($bills_by_amount, (float)$row["amount"]);
			    }

			    return $bills_by_amount;

			}


			function get_owed_bills_by_title($sql_hostname, $sql_username, $sql_password, $db_name, $user_id, $house_id){

				$dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");
							    // connect to DB
			    if (!mysql_select_db($db_name, $dbhandle)) {
			        echo 'Could not select database';
			        exit;
			    }

			    $sql = "SELECT * FROM user_bills WHERE recipient_id=" . $user_id;


			    $result = mysql_query($sql);
			    $bills_by_title = array();

			    while($row = mysql_fetch_assoc($result)){
			    	array_push($bills_by_title, $row["title"]);
			    }

			    return $bills_by_title;

			}



			function add_bill_form($user_id, $tenant_name_array, $tenant_id_array) {
 				echo "<form method='post' action='add_bill_submit.php'>";
				echo "<input type='text' name='bill_name' value='' placeholder='new bill name'>";
				echo "<input type='integer' name='amount' value='' placeholder='bill amount'>";
				echo "<input type='hidden' name='user_id' value=" . $user_id .">";
				
				// create drop down
				echo "  Select bill-payer:";
                echo "<select name='user_selected'>";
                echo  "<option value=''>Select...</option>";
            
            	for($i = 0; $i < sizeof($tenant_name_array); $i++){

                    echo "<option value='" . $tenant_id_array[$i] ."'>" . $tenant_name_array[$i] ."</option>";
                }
            
                echo '</select>';
				echo "<input type='submit' name='commit' value='Add Bill'>";
				echo "</form>";

  			}


  			function delete_bill_form($user_id, $house_id, $payers_by_name, $bills_by_id, $bills_by_amount, $bills_by_title){
  				echo "<form method='post' action='remove_bill_submit.php'>";
				echo "<input type='hidden' name='user_id' value=" . $user_id .">";
				echo "<input type='hidden' name ='house_id' value=". $house_id . ">";

				echo "  Select bill to delete:";
                echo "<select name='bill_selected'>";
                echo "<option value=''>Select...</option>";


            	for($i = 0; $i < sizeof($bills_by_id); $i++){

            		$option_string = "ID: ". $bills_by_id[$i] . "From: " . $payers_by_name[$i] . "  For: $" . $bills_by_amount[$i] . " To cover: " . $bills_by_title[$i];  //"From: " . $owed_to_user_by_payer_id[$i]; . ". Amount: $" . $bills_by_amount[$i];

                    echo "<option value=" . $bills_by_id[$i] ."> " . $option_string ." </option>";
                }
            
                echo '</select>';
				echo "<input type='submit' name='commit' value='Remove Bill'>";


				echo "</form>";


  			}



  			// start main
  			$sql_hostname = "localhost";
            $sql_username = "root";
            $sql_password = "password";
  			$db_name = "users";

  			// Get POST
  			$house_id = $_POST["house_selected"];
  			$user_id = $_POST["user_id"];

  			echo "<p>House roster:</p>";
  			$tenant_name_array = get_house_tenants($sql_hostname, $sql_username, $sql_password, $db_name, $house_id);
  			$tenant_id_array = get_house_tenants_ids($sql_hostname, $sql_username, $sql_password, $db_name, $house_id);
//echo sizeof($tenant_name_array);
echo "    ";
echo sizeof($tenant_id_array);


  			create_add_tenant_form($house_id);
  			delete_tenant_form($house_id);


  			//echo $input_username;
  			$owed_to_user_by_payer_id = get_owed_bills_payer_id($sql_hostname, $sql_username, $sql_password, $db_name, $user_id, $house_id);
  			$bills_by_id = get_owed_bills_by_id($sql_hostname, $sql_username, $sql_password, $db_name, $user_id, $house_id);
  			$bills_by_amount = get_owed_bills_by_amount($sql_hostname, $sql_username, $sql_password, $db_name, $user_id, $house_id);
  			$bills_by_title = get_owed_bills_by_title($sql_hostname, $sql_username, $sql_password, $db_name, $user_id, $house_id);

  			$payers_by_name = array();
  			
  			foreach ($owed_to_user_by_payer_id as $payer){
  				$name = get_name_from_id($sql_hostname, $sql_username, $sql_password, $db_name, $payer);
  				array_push($payers_by_name, $name);
  			}


  			add_bill_form($user_id, $tenant_name, $owed_to_user_by_payer_id);
  			delete_bill_form($user_id, $house_id, $payers_by_name, $bills_by_id, $bills_by_amount, $bills_by_title);

  		?>


  	</body>
</html>