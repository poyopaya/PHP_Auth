<?php
require 'users.php';
redirect(); 											//
function redirect(){
	session_start();
	if ($_SESSION['authorized'] == true) { 				//checking if user is already authorized
		if (!isset($_SESSION['referrer'])) { 			// check if a redirecting page url was submnitted
			header('Location: /');						// redirect to / of the domain if no referring page url was submitted
		} else {
			header('Location: '.$_SESSION['referrer']); // redirect to referring page url (if submitted)
			$_SESSION['referrer'] = "";  				// clear referrer
		}
	}
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {				// case: user submitted login form [type: POST]
//saving submitted username and password in variables
	$username = $_POST['username'];
    $password = $_POST['password'];
	
// check if submitted userinformations (username & password) are correct
    if (check($username, $password)){						// Use defined method in users.php
		$_SESSION['authorized'] = true;					// if successful set the session as authorized
		redirect(); 							// same as initial stage (test if user is authenticated - redirect to referrer)
        exit();									// close script
    } else {
		echo '<p>You entered a wrong password/username</p>';		// optional: shows a simple message if wrong credentials were submitted
	}
}
?>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<form id="loginform" action="login.php" method="post"> <!-- make shure to specify the form with the method="POST" !! -->
			<input type="text" id="username" placeholder="Username"> <!-- this input should get the id username, otherwise you need to change it also in the php script -->
			<input type="password" id="password" placeholder="Password"> <!-- id: same specifications as username -->
			<input type="submit" value="login"> <!-- create a submit button whic triggers the form submit -->
		</form>
 	</body>
</html>
