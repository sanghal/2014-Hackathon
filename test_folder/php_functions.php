<!DOCTYPE html>
<html>
	<head>
    	<link type='text/css' rel='stylesheet' href='style.css'/>
    	<title>HouseManager</title>
  	</head>

  	<body>
  		<?php
  			function login_successful($sql_hostname, $sql_username, $sql_password, $db_name, $username, $password) {
  				echo "hello";

  				// connect to mysql
  				$dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

  				// connect to DB
  				if (!mysql_select_db($db_name, $dbhandle)) {
    				echo 'Could not select database';
    				exit;
			  	}

			  	// create the query we want to execute
			  	$sql = "SELECT * FROM user_login_table";
			  	
			  	/*
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

  				if (user_match) { return $username; }
  				else { return "username or password invalid"; }
  				*/
  				echo "hello";
  			}
  		?>
  	</body>
</html>
