<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<BODY>
<?php
$login=$_POST['login']; // login z formularza
$psw=$_POST['psw']; // hasło z formularza
$pswrepeat=$_POST['psw-repeat']; // hasło z formularza
$link = mysqli_connect('serwer1730296.home.pl', '25509552_1','Szyszunia7', '25509552_1'); // połączenie z BD – wpisać swoje parametry !!!
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
$result = mysqli_query($link, "SELECT login FROM users WHERE login='$login'");
$row = mysqli_fetch_assoc($result);
if($login==$row['login'])
{
echo "uzytkownik o podanej nazwie istnieje!";
}else{
if($psw==$pswrepeat)
{
echo "zakladam konto!";
mysqli_query($link, "INSERT INTO users (login, haslo) VALUES ('$login', '$psw')") or die ("Blad placzenia<br>" .mysql_error());
$login1 = strtolower($login);
mkdir("$login1");
}else{
echo "hasla sie nie zgadzaja!";}
}
