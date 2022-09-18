
<?php
	session_start();
	require_once('User.php');

	if (!empty($_POST)) { 

		$login= $_POST['login'];
		$password= $_POST['password'];
		$email= $_POST['email'];
		$name= $_POST['name'];
	 	$arr= json_decode(file_get_contents('database.json'),true); 

		$user= new User($login, $password, $email, $name, $arr);

		//Проверка режима работы: регистрация или авторизация
		if($user-> isRegister()){
			$user-> register();
		}else{
			$user-> auth();
		}
	}

?>