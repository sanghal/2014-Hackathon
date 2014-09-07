<!DOCTYPE html>
<html>
	<head>
    	<link type='text/css' rel='stylesheet' href='style.css'/>
    	<title>Create House</title>
  	</head>


  	<body>
  		<?php
  			// start here
  			$arg_variable = $_POST['house_name'];
  			$table_name = 'house_table';  			

  			$sql_hostname = "localhost";
            $sql_username = "root";
            $sql_password = "password";
  			$db_name = "users";

            $dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

            // connect to DB
            if (!mysql_select_db($db_name, $dbhandle)) {
                echo 'Could not select database';
                exit;
            }

            // selects house_id for use in deleting other table entries
            $sql = "SELECT house_id FROM " . $table_name . " WHERE house_name='". $arg_variable . "'";
            echo $sql . "<br>";
            $result = mysql_query($sql);

			$row = mysql_fetch_assoc($result);
			echo (int)$row["house_id"];
			$delete_id = (int)$row["house_id"];
			

			// deletes table entry for house from house_table
  			echo "I'm deleting " . $arg_variable . "!<br>";
  			$sql = "DELETE FROM `" . $table_name . "` WHERE house_name='" . $arg_variable ."'"; // AND creator_id = $userid;
  			echo $sql;
  			mysql_query($sql);

  			// deletes all house_id, user_id from username_house by house_id
			echo "I'm deleting " . $delete_id . "!<br>";
  			$sql = "DELETE FROM `username_house` WHERE house_id='" . $delete_id ."'"; // AND creator_id = $userid;
  			echo $sql;
  			mysql_query($sql);

  		?>

	</body>
</html>