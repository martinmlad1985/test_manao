    
<?php
    echo(file_get_contents('header.php'));
?>

    <div class="content">
        <?php
            session_start();
            if($_SESSION['user']){
                echo('Hello,' . ' ' . $_SESSION['user']);
            }else{
                header('Location: index.php'); 
            }
            
        ?>
        <a href="logout.php" class="btn btn-primary">Выйти</a>
    </div>




    </body>
</html>



