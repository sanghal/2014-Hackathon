<!DOCTYPE html>
<html id="index_page">
	<head>
    	<link type='text/css' rel='stylesheet' href='style.css'/>
    	<title>Register Submit</title>
  	</head>


  	<body>
  		<?php

  			function register_user($sql_hostname, $sql_username, $sql_password, $db_name, $table_name, $username, $password) {
  			
				// connect to mysql
                $dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

                // connect to DB
                if (!mysql_select_db($db_name, $dbhandle)) {
                    echo 'Could not select database';
                    exit;
                }

                // find the largest current id
                $sql = "SELECT * FROM " . $table_name;
                $result = mysql_query($sql, $dbhandle);
                if (!$result) {
                    echo "DB Error, could not query the database\n";
                    echo 'MySQL Error: ' . mysql_error();
                    exit;
                }

                $user_exists = 0;
                $highest_id = 0;
                while ($row = mysql_fetch_assoc($result)) {
                	// check to see if user already exists
                	if ( $username == $row["username"] ) {
                		echo "username already exists";
                		exit;
                	}

                	// increment id
                    if ( (int)$row["id"] > $highest_id ) {
                        $highest_id = (int) $row["id"];
                    }
                }

                $highest_id++;

                // construct sql statement
  				$sql = "INSERT INTO " . $table_name . " (id, username, password, admin) VALUES(" . $highest_id . ",'" . $username . "', '" . $password . "', 0)";

  				echo $sql . "<br>";

                // run query
                mysql_query($sql);

                // close connection
                mysql_close($dbhandle);
  			}

  			// get post data
  			$input_username = $_POST["username"];
  			$input_password = $_POST["password"];
  			$input_repeat_password = $_POST["repeat_password"];

  			// check if user entered both passwords the same
  			if ($input_password != $input_repeat_password) {
  				echo "passwords do not match<br>";
  			}

  			$sql_hostname = "localhost";
            $sql_username = "root";
            $sql_password = "password";
  			$db_name = "users";
            $table_name = "user_login_table";
  			register_user($sql_hostname, $sql_username, $sql_password, $db_name, $table_name, $input_username, $input_password);
  		?>

	</body>
</html>