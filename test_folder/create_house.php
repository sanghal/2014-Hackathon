<!DOCTYPE html>
<html>
	<head>
    	<link type='text/css' rel='stylesheet' href='style.css'/>
    	<title>Create House</title>
  	</head>
  	<body>
  		<?php
  			$user_id = $_POST["user_id"];
  			$house_name = $_POST["house_name"];
  			$sql_hostname = "localhost";
            $sql_username = "root";
            $sql_password = "password";
  			$db_name = "users";

	  		function create_house($sql_hostname, $sql_username, $sql_password, $db_name, $user_id, $house_name) {
                $dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

                // connect to DB
                if (!mysql_select_db($db_name, $dbhandle)) {
                    echo 'Could not select database';
                    exit;
                }

                // create the query we want to execute
                // $table_name should = house_table
                $sql = "SELECT * FROM house_table";
                
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
                    if ( $row["house_name"] == $house_name) {
                        echo "House name already exists. Please choose a new name.";
                        exit;
                    }

                    // increment id
                    if ( (int)$row["house_id"] > $highest_id ) {
                        $highest_id = (int) $row["house_id"];
                    }
                }
                $highest_id++;

                // create sql query to insert row into house_table
                $sql = "INSERT INTO house_table (house_id, house_name, creator_id) VALUES (" . $highest_id . ",'" . $house_name . "'," . $user_id . ")";
                echo $sql;
                // run query
                mysql_query($sql);

                // create sql query to insert row into username_house table
                $sql = "INSERT INTO username_house (user_id, house_id) VALUES (" . $user_id . "," . $highest_id . ")";
                echo $sql;
                // run query
                mysql_query($sql);
            }

     		create_house($sql_hostname, $sql_username, $sql_password, $db_name, $user_id, $house_name);

     	?>

  	</body>
</html>