<?php
if($_COOKIE['login'] == 'zalogowany')
    {
        $czas = time();
        setcookie("user", "", $czas);
        setcookie("haslo", "", $czas);
        setcookie("login", "", $czas);
        echo '<font color=#00BB00>Zostałeś poprawnie wylogowany!</font> <br/> <a href="index.html">wróć</a>';
    } 
    else
    {
        echo '<font color=#C60000>Nie byłes zalogowany!</font> <br/>';
            
    }
?>
