
    <?php
        echo(file_get_contents('header.php'));
        include('code.php');
    ?>
    
    <form class="form"  method="POST">
        <input type="text" name="login" placeholder="login" minlength="6"  required>
        <input type="password" id="password" name="password" placeholder="password" pattern="(?=.*\d)(?=.*[A-Za-zА-Яа-яЁё]).{6,}"  title="Пароль должен состоять из букв и цифр, не менее 6 символов" required>
        <input type="password" id="confirm_password" name="confirm" placeholder="confirm password"  title="Пароли должены совпадать"  required>
        <input type="email" name="email" placeholder="email" required>
        <input type="text" name="name" placeholder="name" pattern="(?=.*[A-Za-zА-Яа-яЁё]).{2,}" title="Не менее двух букв"  required>
      
        <input type="submit" onclick= send() >
    </form>

    <?php
        echo(file_get_contents('footer.php'));
    ?>

