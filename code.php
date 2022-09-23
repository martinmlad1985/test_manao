
<?php
	session_start();
	require('User.php');

	if (!empty($_POST)) { 

		$login= $_POST['login'];
		$password= $_POST['password'];
		$email= $_POST['email'];
		$name= $_POST['name'];
	 	$arr= json_decode(file_get_contents('database.json'),true); 

		//Защита от иньекций
		function clean($value = "") {
			$value = trim($value);
			$value = stripslashes($value);
			$value = strip_tags($value);
			$value = htmlspecialchars($value);
			return $value;
		}

		$login= clean($login);
		$password= clean($password);
		$email= clean($email);
		$name= clean($name);


		$user= new User($login, $password, $email, $name, $arr);

		//Проверка режима работы: регистрация или авторизация
		if($user-> isRegister()){
			echo $user-> register();
		}else{
			echo $user-> auth();
		}
	}

?>