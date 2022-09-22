
<?php

    class User{
        private $login;
        private $password;
        private $email;
        private $name;
        private $arr;

        public function __construct($login, $password, $email, $name, $arr){
			$this->login = $login;
			$this->password = $password;
            $this->email = $email;
            $this->name = $name;
            $this->arr= $arr;
		}


        public function isRegister(){    //---Определение режима работы: регистрация или авторизация  
            if (count($_POST)== 5) {
				return true;
			} 
			if (count($_POST)== 2) {
				return false;
			}
        }


        public function register(){     //---Регистрация
            if(!$this->arr){            //---Если база данных пуста, то производим регистрацию
                $this-> registerSuccess();
                return json_encode(array('status'=> true));
            }else{
                foreach($this-> arr as $key=>$elem){
                    if($key == $_POST['login']){
                        return json_encode(array('status'=> false, 'message'=>'Такой логин уже существует, выберите другой'));  // Если зарегистрирован такой логин, то выдаём ошибку
                        break;
                    } 
                    if($elem[1] == $_POST['email']){
                        return json_encode(array('status'=> false, 'message'=>'Пользователь с таким e-mail уже существует'));  // Если зарегистрирован такой логин, то выдаём ошибку
                        break;
                    } 
                }
                $this-> registerSuccess();   //Проводим регистрацию
                return json_encode(array('status'=> true));
            }
        }



        public function auth(){
            if(!$this->arr){    // Попытка регистрации при пустой базе данных. Выдаём ошибку
                return json_encode(array('status'=> false, 'message'=>'Введён некорректный логин или пароль'));  
            }else{
                    foreach($this->arr as $key=>$elem){
                        if($key == $this->login and $elem[0] == md5($elem[3] . $this->password)){  // Проверка совпадения логина и пароля
                            $_SESSION['user']= $elem[2];
                            return json_encode(array('status'=> true));
                            break;
                        }
                    }
                    return json_encode(array('status'=> false, 'message'=>'Введён некорректный логин или пароль'));  
                }
        }


        //Проведение регистрации и одновременная авторизация
        private function registerSuccess(){
            $salt = $this->generateSalt(); // соль
	        $passwordSalt = md5($salt . $this->password); // соленый пароль
            $this->arr[$this-> login]=[$passwordSalt, $this-> email, $this-> name, $salt];
            file_put_contents('database.json', json_encode($this->arr, JSON_FORCE_OBJECT));
            $_SESSION['user']= $this-> name;
        }


        //Генерируем соль
        private function generateSalt()	{
		$salt = '';
		$saltLength = 8; // длина соли
		
		for($i = 0; $i < $saltLength; $i++) {
			$salt .= chr(mt_rand(33, 126)); // символ из ASCII-table
		}
		
		return $salt;
	}

    }

?>










