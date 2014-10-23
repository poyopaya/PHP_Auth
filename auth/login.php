<?php
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
    if ($username === "usernameHERE" && $password === "passwordHERE"){
		$_SESSION['authorized'] = true;					// if successful set the session as authorized
		redirect(); 									// same as initial stage (test if user is authenticated - redirect to referrer)
        exit();											// close script
    }
}
?>