
<?php
    echo(file_get_contents('header.php'));
    include('code.php');
?>
    
    <form class="form" method="POST">
        <input type="text" name="login" placeholder="login" required>
        <input type="password" id="password" name="password" placeholder="password" required>
        <input type="submit">
    </form>

<?php
    echo(file_get_contents('footer.php'));
?>



