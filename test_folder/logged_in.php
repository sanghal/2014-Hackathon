<!DOCTYPE html>
<html>
	<head>
    	<link type='text/css' rel='stylesheet' href='style.css'/>
    	<title>HouseManager: Welcome!</title>
  	</head>
  	<body>
  		Welcome!<br>
  		<?php

            // returns username if login is successful
            // else returns error message
            function login_successful($sql_hostname, $sql_username, $sql_password, $db_name, $table_name, $username, $password) {
                // connect to mysql
                $dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

                // connect to DB
                if (!mysql_select_db($db_name, $dbhandle)) {
                    echo 'Could not select database';
                    exit;
                }

                // create the query we want to execute
                $sql = "SELECT * FROM " . $table_name;
                
                // run the query
                $result = mysql_query($sql, $dbhandle);

                if (!$result) {
                    echo "DB Error, could not query the database\n";
                    echo 'MySQL Error: ' . mysql_error();
                    exit;
                }

                $user_match = False;
                // go through all matches of username and look for password match
                while ($row = mysql_fetch_assoc($result)) {
                    if ($username == $row["username"] and $password == $row["password"]) {
                        $user_match = True;
                        break;
                    }
                }

                mysql_free_result($result);
                mysql_close($dbhandle);

                if ($user_match) { return $username; }
                else { return "username or password invalid"; }
            }


            // Start main
  			$input_username = $_POST["username"];
  			$input_password = $_POST["password"];
  			$sql_hostname = "localhost";
            $sql_username = "root";
            $sql_password = "password";
  			$db_name = "users";
            $table_name = "user_login_table";

            echo login_successful($sql_hostname, $sql_username, $sql_password, $db_name, $table_name, $input_username, $input_password);
            echo "<br>hello";

  			/*
  			echo "login: " . $username . "<br>";
  			echo "password: " . $_POST["password"] . "<br>";
  			*/

  		?>

  	</body>
</html>