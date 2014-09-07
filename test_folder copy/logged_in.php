<!DOCTYPE html>
<html>
	<head>
    	<link type='text/css' rel='stylesheet' href='style.css'/>
    	<title>HouseManager: Welcome!</title>
  	</head>
  	<body>
  		Welcome!<br>
  		<?php

            function get_house_list($sql_hostname, $sql_username, $sql_password, $db_name, $table_name, $user_id) {
                // connect to mysql
                $dbhandle = mysql_connect($sql_hostname, $sql_username, $sql_password) or die("Unable to connect to MySQL");

                // connect to DB
                if (!mysql_select_db($db_name, $dbhandle)) {
                    echo 'Could not select database';
                    exit;
                }

                $sql = "SELECT house_id FROM " . $table_name . " WHERE user_id=" . $user_id;
                //echo $sql;

                $result = mysql_query($sql);

                if (!$result) {
                    echo "DB Error, could not query the database\n";
                    echo 'MySQL Error: ' . mysql_error();
                    exit;
                }                

                // get all house_id's
                $house_id_array = array();
                while ($row = mysql_fetch_assoc($result)) {
                    array_push($house_id_array, $row["house_id"]);
                }                

                // get names of houses
                $house_name_array = array();
                foreach($house_id_array as $house_id) {
                    $sql = "SELECT house_name FROM house_table WHERE house_id=" . $house_id;
                    $result = mysql_query($sql);
                    $row = mysql_fetch_assoc($result);
                    array_push($house_name_array, $row["house_name"]);
                }

                $house_id_array_length = sizeof($house_id_array);
                $house_name_array_length = sizeof($house_name_array);
            
                if($house_id_array_length != $house_name_array_length){
                      echo "Error, unequal number of houses and id's";
                }
                
                echo "<form method='post' action='modify_house.php'>";
                echo "Select your house:";
                echo "<select name='house_selected'>";
                echo  "<option value=''>Select...</option>";
            
            
                for($i = 0; $i < $house_id_array_length; $i++){
                    echo "<option value = '" . $house_id_array[$i] ."'>" . $house_name_array[$i] ."</option>";
                }
            
                echo '</select>';
                echo "<input type='hidden' name='user_id' value='" . $user_id . "'>";
                echo "<input type='submit' name='commit' value='Modify House'>";
                echo "</form>";

            }

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
                $user_id = 0;
                // go through all matches of username and look for password match
                while ($row = mysql_fetch_assoc($result)) {
                    if ($username == $row["username"] and $password == $row["password"]) {
                        $user_match = True;
                        $user_id = (int) $row["id"];
                        break;
                    }
                }

                mysql_free_result($result);
                mysql_close($dbhandle);

                if ($user_match) { echo $username . "<br>"; }
                else {
                    echo "username or password invalid";
                    exit;
                }
                return $user_id;
            }


            // Start main
  			$input_username = $_POST["username"];
  			$input_password = $_POST["password"];
  			$sql_hostname = "localhost";
            $sql_username = "root";
            $sql_password = "password";
  			$db_name = "users";
            $table_name = "user_login_table";

            $user_id = login_successful($sql_hostname, $sql_username, $sql_password, $db_name, $table_name, $input_username, $input_password);

            // Create house form
  			echo "<form method='post' action='create_house.php'><input type='hidden' name='user_id' value=" . $user_id . ">";
            echo "<input type='text' name='house_name' value='' placeholder='name of house'><input type='submit' name='commit' value='Create House'></form>";
  		   
            // delete house form
            echo "<form method='post' action='delete_house.php'>";
            echo "<input type='text' name='house_name' value='' placeholder='name of house'>";
            echo "<input type='submit' name='commit' value='Delete House'>";
            echo "</form>";

            //
            // Manage house form
            //

            // Get list of houses the user is a part of
            get_house_list($sql_hostname, $sql_username, $sql_password, $db_name, "username_house", $user_id);

        ?>

        



        <?php
            // add to house, remove from house
        ?>

  	</body>
</html>