    
    <?php
        echo(file_get_contents('header.php'));
        session_start();
        if(!$_SESSION['user']){
    ?>

        <header>Добро пожаловать на тестовое приложение Димы Мартинкевича</header>
        <div class="greeting">
            <a href="register.php" class="btn btn-primary">регистрация</a>
            <a href="auth.php" class="btn btn-primary">авторизация</a>
        </div>

    <?php
        }else{
            header('Location: content.php');
        }
    ?>
    
    </body>
</html>




