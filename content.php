    
<?php
    echo(file_get_contents('header.php'));
?>

    <div class="content">
        <?php
            session_start();
            echo('Привет' . ' ' . $_SESSION['user']);
        ?>
        <a href="logout.php" class="btn btn-primary">Выйти</a>
    </div>


    </body>
</html>



