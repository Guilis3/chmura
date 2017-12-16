<?
define('DB_HOST','serwer1730296.home.pl');
define('DB_USER','25509552_0000008'); //wpisz nazwęużytkownika bazy danych
define('DB_PASS','Szyszunia7'); //wpisz hasło dla tego użytkownika
define('DB_DB','25509552_0000008');

$connect = mysql_connect(DB_HOST, DB_USER, DB_PASS)
or die('Nie udało połączyc się z bazą danych. '.mysql_error());

mysql_select_db(DB_DB,$connect)
?>
