<?php

	function add_bill_submit($sql_hostname, $sql_username, $sql_password, $db_name, $bill_title, $bill_amount, $recipient_id, $payer_id) {
		// connect to mysql
        $dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

        // connect to DB
        if (!mysql_select_db($db_name, $dbhandle)) {
            echo 'Could not select database';
            exit;
        }

        // Find id to assign to the bill
        $sql = "SELECT * FROM user_bills";
        
        // run the query
        $result = mysql_query($sql, $dbhandle);

        if (!$result) {
            echo "DB Error, could not query the database\n";
            echo 'MySQL Error: ' . mysql_error();
            exit;
        }

        // find id for this house
        // also check if user is in this house
        $highest_id = 0;
        while ($row = mysql_fetch_assoc($result)) {

            // increment id
            if ( (int)$row["bill_id"] > $highest_id ) {
                $highest_id = (int) $row["bill_id"];
            }
        }
        $highest_id++;

        $sql = "INSERT INTO user_bills (bill_id, payer_id, amount, recipient_id, title, description) VALUES (" . $highest_id . "," . $payer_id . "," . $bill_amount . "," . $recipient_id . ",'" . $bill_title . "','')";
        echo $sql;
        mysql_query($sql);

	}

	$bill_name = $_POST["bill_name"];
	$bill_amount = $_POST["amount"];
	$recipient_id = $_POST["user_id"];
	$payer_id = $_POST["user_selected"];

	$sql_hostname = "localhost";
    $sql_username = "root";
    $sql_password = "password";
	$db_name = "users";

	echo $bill_name . "<br>";
	echo $bill_amount . "<br>";
	echo $recipient_id . "<br>";
	echo $payer_id . "<br>";

	add_bill_submit($sql_hostname, $sql_username, $sql_password, $db_name, $bill_name, $bill_amount, $recipient_id, $payer_id);

?>