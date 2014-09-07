<?php

	function remove_bill_submit($sql_hostname, $sql_username, $sql_password, $db_name, $bill_id){
		// connect to mysql
        $dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

        // connect to DB
        if (!mysql_select_db($db_name, $dbhandle)) {
            echo 'Could not select database';
            exit;
        }

        $sql = "DELETE FROM user_bills WHERE bill_id=" . $bill_id;
        //echo $sql;

        mysql_query($sql);

	}




	//main

	$bill_id = $_POST["bill_selected"];
	$recipient_id = $_POST["user_id"];
	$house_id = $_POST["house_id"];

	$sql_hostname = "localhost";
    $sql_username = "root";
    $sql_password = "password";
	$db_name = "users";

	remove_bill_submit($sql_hostname, $sql_username, $sql_password, $db_name, $bill_id);

?>
