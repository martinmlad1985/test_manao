
<?php
    echo(file_get_contents('header.php'));
?>
    
    <form class="form" method="POST">
        <input type="text" name="login" placeholder="login" required>
        <input type="password" id="password" name="password" placeholder="password" required>
        <input type="submit">
    </form>

    <div class="error">3333333333333</div> 

<?php
    echo(file_get_contents('footer.php'));
?>



