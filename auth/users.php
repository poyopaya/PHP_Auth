<!--
// TODO
// -create user & password array
// - add an encryption method
-->
<?php
$users = [					//create $users-array (PHP5.4)
	"test" => "test",			// structure: "username" => "password",
	"user2" => "user2_password",
	"user3" => "user3_password",
	"user4" => "user4_password",
];
function check($username, $password){		// method for checking if parametrisized password and username are found in array
	if ($password === $users[$username]){	// if password saved under array("username"-> "password") equas with submitted password,
		return true;			//return true
	}else {					//else return false
		return false;
	}
}
?>
