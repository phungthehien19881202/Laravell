<?php
	session_start();
	if(isset($_POST['form-username']) && isset($_POST['form-password'])) {
		$username = $_POST['form-username'];
		$password = $_POST['form-password'];
		
		if($username == "admin" && $password == "123") {
			$_SESSION['login_name'] = $username;
			header("Location:index.php");
		} else {
			header("Location:login.php?msg=Nhập lại");
		}
	} else {
		header("Location:login.php?msg=Nhập lại");
	}
?>