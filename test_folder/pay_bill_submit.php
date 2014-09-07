<?php

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



	function direct_to_venmo($sql_hostname, $sql_username, $sql_password, $db_name, $bill_id){
		$sql = "SELECT * FROM user_bills where bill_id=" . $bill_id;

		$result = mysql_query($sql);
		
		$recipient_id = (int)$row["recipient_id"];
		$recipient_name = get_name_from_id($sql_hostname, $sql_username, $sql_password, $db_name, $recipient_id);
		$payment_amount = (float)$row["amount"];
		$payment_title = $row["title"];



		$url = "https://venmo.com/?txn=pay&recipients=" . $recipient_name . "&amount=" . $payment_amount . "&note=" . $payment_title . "&audience=public";
		echo $url;
		echo "<br>";





	}



	//main

	$bill_id = $_POST["bill_selected"];

	direct_to_venmo($sql_hostname, $sql_username, $sql_password, $db_name, $bill_id);

?>