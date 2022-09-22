
<?php
    echo(file_get_contents('header.php'));
    session_start();
    if(!$_SESSION['user']){
?>
    
    <form class="form" method="POST">
        <input type="text" name="login" placeholder="login" required disabled>
        <input type="password" id="password" name="password" placeholder="password" required disabled>
        <input type="submit" class="submit hide">
    </form>

    <div class="error"></div> 

<?php
 }else{
    header('Location: content.php');
}
echo(file_get_contents('footer.php'));
?>



