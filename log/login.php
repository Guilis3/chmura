<?php
require('conn.php');

if (isset($_POST['loguj']))
{
   $login = $_POST['login'];
   $haslo = $_POST['haslo'];
   $datagodzina = date("Y-m-d H:i:s");
   if (mysql_query("SELECT login, haslo FROM uzytkownicy WHERE login = '".$login."' AND haslo = '".md5($haslo)."';"))
   {
//href='http://dawid.malyzolw.pl/z8/index2.html'
 echo "zalogowano";
   }
   else echo "Wpisano złe dane. <br>";
  $bledneporby = $_POST['bledneproby'];
  $bledneproby += 1 ;
    echo "Błędnych logowań: ", $bledneproby ;
    echo "Ostatnie błędne logowanie: $datagodzina" ;

$ile = mysql_query ("SELECT count(id) FROM logi");
$ile = mysql_result($zapytanie, 0, 0) or die("Wystąpił błąd 0" );


    if ('$ile' <= 3)   {
    $zapytanie="INSERT INTO logi (bledneproby, datagodzina) VALUES('$bledneproby','$datagodzina')";
   mysql_query($zapytanie) or die("Wystąpił błąd 1" );
}
    else {
         $zapytanie2="UPDATE logi (bledneproby, datagodzina) VALUES ('$bledneproby','$datagodzina') WHERE id == MIN(id)";
   mysql_query($zapytanie2) or die("Wystąpił błąd 2" );
    }}
?>
