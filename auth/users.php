<!--
// TODO
// -create user & password array
// - add an encryption method
-->
<?php
$users = [
	"test" => "test",
	"user2" => "user2_password",
	"user3" => "user3_password",
	"user4" => "user4_password",
];
function check($username, $password){
	if ($password === $users[$username]){
		return true;
	}else {
		return false;
	}
}
?>