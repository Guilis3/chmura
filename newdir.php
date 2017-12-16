<?php
if($_COOKIE['login'] == 'zalogowany')
{   
    session_start();
    $lok = $_SESSION['myvar'];
    $user = $_COOKIE['user'];
    $dir1 = $_POST['dir'];
    $path = $lok. '/' . $dir1; 
    echo 'katalog: '; echo $dir1; echo ' zostal stworzony ';
    mkdir( $path, 0777, true );
    echo '<a href="main.php">wroc</a>';
}else{
    echo 'Niezalogowany!!  <a href="index.html">zaloguj</a>';
}
?>