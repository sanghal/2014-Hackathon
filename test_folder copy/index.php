<!DOCTYPE html>
<html id="index_page">
	<head>
    	<link type='text/css' rel='stylesheet' href='style.css'/>
    	<title>HouseManager</title>
  	</head>
  	<body>
  		<div class="top_bar">
  			<ul class="nav_list">
  				<li id="logo">
  					<a href="index.php"><img src="house_large.png"></a>
  				</li>
  			<?php

  				// Create a dictionary with all link text
  				// and the href they go to
  				$menu_options = [
  					"bio" => "bio_link",
  					"guitars" => "guitars_link",
  					"anna" => "anna_link",
  					"login" => "login_page.php"
  				];

  				// Make the list items
  				foreach($menu_options as $key => $value) {
  					echo "<li><a href=" . $value . ">" . $key . "</a></li>";
  				}
  			?>

  				<div class="login_box">
		  			<li>login:</li>
		  			<li>
			  			<form method="post" action="logged_in.php">
		  					<input type="text" name="username" value="" placeholder="Username or Email">
		  					<input type="password" name="password" value="" placeholder="Password">
		  					<input type="submit" name="commit" value="Login">
			  			</form>
			  			<form method="post" action="register.php">
			  				<input type="submit" name="register" value="Register">
			  			</form>
			  		</li>

			  	</div>

  			</ul>
  		</div>
  		<div id="header"></div>


		<h1 class="subject_header">Hello from tyler's web page</h1>
		<?php

			$myArray = array("I", "am", "a", "word");

			// I am a comment
	    	function writeMessage($arrayIn) {
	    		echo("\n");
	        	foreach($arrayIn as $arrayItem) {
	        	    echo $arrayItem . " ";
	        	}
	        }

	        function fillPage() {
	        	for($i=0; $i<100; $i++) {
	        		echo "<br>" . "hi";
	        	}
	        }

	    	writeMessage($myArray);
	    	fillPage();

	    	// class test
	    	class TestClass {
	    		private $letter_array = array("a", "b", "c", "d");

	    		function __construct() {}
	    		public function print_letter_array() {
	    			foreach($this->letter_array as $letter) {
	    				echo $letter . " ";
	    			}
	    		}
	    	}

	    	$class_test = new TestClass();
	    	$class_test->print_letter_array();
		?>
  </body>
</html>