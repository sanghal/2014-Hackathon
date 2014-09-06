<!DOCTYPE html>
<html id="index_page">
	<head>
    	<link type='text/css' rel='stylesheet' href='style.css'/>
    	<title>Register Submit</title>
  	</head>


  	<body>
  		<?php

  			function register_user($sql_hostname, $sql_username, $sql_password, $db_name, $table_name, $username, $password) {
  			
  				// construct sql statement
  				$sql = "INSERT INTO " . $table_name . " (id, username, password, admin) VALUES(3,'" . $username . "', '" . $password . "', 0)";

				echo $sql;

				// connect to mysql
                $dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

                // connect to DB
                if (!mysql_select_db($db_name, $dbhandle)) {
                    echo 'Could not select database';
                    exit;
                }

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