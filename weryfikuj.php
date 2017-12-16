<?php
$time=time();
$data=date('Y-m-d H-i-s');
$user=$_POST['user'];
$pass=$_POST['pass'];
$link = mysqli_connect('serwer1730296.home.pl', '25509552_1','Szyszunia7', '25509552_1'); // połączenie z BD – wpisać swoje parametry !!!
if(!$link) { echo"Błąd: ". mysqli_connect_errno()." ".mysqli_connect_error(); } // obsługa błędu połączenia z BD
mysqli_query($link, "SET NAMES 'utf8'"); // ustawienie polskich znaków
$result = mysqli_query($link, "SELECT * FROM users WHERE login='$user'"); // pobranie z BD wiersza, w którym login=login z formularza
$rekord = mysqli_fetch_assoc($result); // wiersza z BD, struktura zmiennej jak w BD
if($rekord['bledy']<3){
if(!$rekord)
{mysqli_close($link);
}else
{if($rekord['haslo']==$pass)
{  $czas = time();
  setcookie("user", "$user", $czas+3600);
  setcookie("haslo", "$pass ", $czas+3600);
  setcookie("login", "zalogowany", $czas+3600);
mysqli_query($link,"INSERT INTO logi (id_log, usrnm, data, bledy) VALUES ('','$user','$data', '0')");
mysqli_query($link,"UPDATE users SET bledy = '0' WHERE login ='$user'");
?>
<script type="text/javascript">
window.location.href = 'main.php';
</script>
<?php
}else
{echo "Złe dane logowania!";
mysqli_query($link,"INSERT INTO logi (id_log, usrnm, data, bledy) VALUES ('','$user','$data', '1')");
$result1 = mysqli_query($link, "SELECT * , count( NULLIF( bledy, 0 ) ) ilosc FROM logi WHERE usrnm = '$user'"); // pobranie z BD wiersza, w którym login=login z formularza
$rekord1 = mysqli_fetch_assoc($result1); // wiersza z BD, struktura zmiennej jak w BD
$bledy = $rekord1['ilosc'];
mysqli_query($link,"UPDATE users SET bledy = '$bledy' WHERE login ='$user'");
mysqli_close($link);
}}
}else{echo "Konto zostało zablokowane! ponad 3 nieudane proby logowania!";}
?>
