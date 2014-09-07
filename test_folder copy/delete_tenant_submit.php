<?php

function delete_house_tenant_submit($sql_hostname, $sql_username, $sql_password, $db_name, $house_id, $username) {

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

	    // check if they are already in the house
		$sql = "SELECT user_id FROM username_house WHERE user_id=" . $user_id . " AND house_id=" . $house_id;
		echo $sql;
		$result = mysql_query($sql);
		$num_results = mysql_num_rows($result);

		if ($num_results > 0) {
			$sql = "DELETE FROM username_house WHERE user_id=" . $user_id . " AND house_id=" . $house_id;
			echo $sql;
			mysql_query($sql);
		}
		else {
			echo "User does not live in house.<br>";
			exit;
		}
	}

	$house_id = $_POST['house_id'];
	$username = $_POST['username'];

	$sql_hostname = "localhost";
	$sql_username = "root";
	$sql_password = "password";
	$db_name = "users";
	delete_house_tenant_submit($sql_hostname, $sql_username, $sql_password, $db_name, $house_id, $username);

	?>


