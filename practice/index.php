<!DOCTYPE html>
<html>
    <head>
        <link type='text/css' rel='stylesheet' href='style.css'/>
		<title>PHP FTW!</title>
	</head>
	<body>
        <!-- Write your PHP code below!-->
        <p>
        <?php
            // create a connection to our database
            $dbhandle = sqlite_open('db/test.db', 0666, $error);

            // check if connection successful
            if (!$dbhandle) die ($error);



            $myArray = array("I", "am", "a", "word");
        
            function writeMessage($arrayIn) {
                foreach($arrayIn as $arrayItem) {
                    echo $arrayItem . " ";
                }
                
                echo "Hello World";
            }
            
            writeMessage($myArray);
            
            $myName = "Tyler";
            $myAge = 99999;
            $output = "hello my name is " . $myName . " I am " . $myAge . " years old.<br>";
            
            echo $output;
        ?>
        </p>   
	</body>
</html>