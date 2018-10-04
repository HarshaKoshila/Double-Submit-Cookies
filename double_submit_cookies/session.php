<?php
	session_set_cookie_params(300);
	session_start();
	session_regenerate_id();
	setcookie('session_id', session_id(), time() + 300, '/');
	$token = base64_encode(openssl_random_pseudo_bytes(32));
	setcookie('csrf', $token, time() + 300, '/', '', true);
	$_SESSION['logged']=true;
	$_SESSION['user']=$dbName;
	$_SESSION['admin']=$dbAdmin;
	if(!empty($_SESSION['user'])||!empty($_SESSION['admin']))
		header("location: admin.php");
	else{
		$_SESSION['user']=$username;
		header("location: login.php");
	}
?>
