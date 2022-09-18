
<?php

    class User{
        private $login;
        private $password;
        private $email;
        private $name;
        private $arr;
        private $salt;

        public function __construct($login, $password, $email, $name, $arr){
			$this->login = $login;
            $this->salt = '12345';
			$this->password = md5($this->salt . $password);
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
            }else{
                foreach($this-> arr as $key=>$elem){
                    if($key == $_POST['login']){
                        echo($this->showMessage('Такой логин уже есть'));     // Если зарегистрирован такой логин, то выдаём ошибку
                    } 
                    else{
                        $this-> registerSuccess();   //Проводим регистрацию
                    }
                }
            }
        }



        public function auth(){
            if(!$this->arr){
                echo($this->showMessage('Введён некоректный логин или пароль'));   // Попытка регистрации при пустой базе данных. Выдаём ошибку
            }else{
                    foreach($this->arr as $key=>$elem){
                        if($key == $this->login and $elem[0] == $this->password ){  // Проверка совпадения логина и пароля
                            $_SESSION['user']= $elem[2]; 
                            header('Location: content.php');
                            break;
                        }
                        else{
                            echo($this->showMessage('Введён некоректный логин или пароль'));
                        }
                    }
                }
        }


        //Проведение регистрации и одновременная авторизация
        private function registerSuccess(){
            $this->arr[$this-> login]=[$this-> password, $this-> email, $this-> name];
            file_put_contents('database.json', json_encode($this->arr));
            $_SESSION['user']= $this-> name;
            header('Location: content.php');
        }


        //Вывод сообщений
        private function showMessage($message){
            return ("
                    <div class='error'>
                        <p>$message</p>
                        <a href='index.php' class='btn btn-primary'>Повторить</a>
                    </div>
                    ");
        }


        //Генерация соли
        private function generateSalt(){
		$salt = '';
		$saltLength = 8; // длина соли
		for($i = 0; $i < $saltLength; $i++) {
			$salt .= chr(mt_rand(33, 126)); // символ из ASCII-table
		}
		return $salt;
	}

    }

?>










