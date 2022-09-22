
    <?php
        echo(file_get_contents('header.php'));
        session_start();
        if(!$_SESSION['user']){

    ?>
    
    <form class="form"  method="POST" data-check="false">
        <input type="text" name="login" placeholder="login" minlength="6" required disabled>
        <input type="password" id="password" name="password" placeholder="password" pattern="(?=.*\d)(?=.*[a-z]).{6,}"  title="Пароль должен состоять из букв и цифр, не менее 6 символов" required disabled>
        <input type="password" id="confirm_password" name="confirm" placeholder="confirm password"  title="Пароли должены совпадать"  required disabled>
        <input type="email" name="email" placeholder="email" required disabled>
        <input type="text" name="name" placeholder="name" pattern="([A-Za-zА-Яа-яЁё]){2,}" title="Не менее двух букв"  required disabled>
      
        <input type="submit"class=" submit hide" onclick= send() >
    </form>

    <div class="error"></div> 

    <?php
     }else{
        header('Location: content.php');
    }
    echo(file_get_contents('footer.php'));
    ?>

