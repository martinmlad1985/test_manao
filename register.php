
    <?php
        echo(file_get_contents('header.php'));
        session_start();
        if(!$_SESSION['user']){

    ?>
    
    <form class="form"  method="POST" data-check="false">
        <input type="text" name="login" placeholder="login"  pattern="(\S){6,}" title="Пароль должен состоять из любых символов. Не менее 6 символов. Без пробелов"required disabled>
        <input type="password" id="password" name="password" placeholder="password" pattern="(?!.*\s)(?=[A-Za-zА-Яа-яЁё]*\d)(?=\d*[A-Za-zА-Яа-яЁё]).{6,}"  title="Пароль должен состоять из букв и цифр, не менее 6 символов. Без пробелов" required disabled>
        <input type="password" id="confirm_password" name="confirm" placeholder="confirm password"  title="Пароли должены совпадать"  required disabled>
        <input type="email" name="email" placeholder="email" pattern="^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$" title="Неправильно введён адрес" required disabled>
        <input type="text" name="name" placeholder="name" pattern="(?!.*\s)([A-Za-zА-Яа-яЁё]){2,}" title="Не менее двух букв без пробелов"  required disabled>
      
        <input type="submit"class=" submit hide">
    </form>

    <div class="error"></div> 

    <?php
     }else{
        header('Location: content.php');
    }
    echo(file_get_contents('footer.php'));
    ?>

