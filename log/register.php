<?php

require('conn.php');
if (isset($_POST['konto']) and isset($_POST['password']) and isset($_POST['password2']))
{
if ($_POST['password']==$_POST['password2'])
  {
   $konto =  $_POST['konto'];      
    $password = sha1($_POST['password']);
   $data = date("Y-m-d H:i:s");
   $czy =mysql_query("SELECT * FROM `logi` WHERE bledneproby = '$bledneproby'");
   $czy = mysql_num_rows($czy);
   
   $ile =mysql_query("SELECT * FROM `user` WHERE login = '$konto'");
   $ile = mysql_num_rows($ile);
   
   if ($ile==0)   {
   $zapytanie="INSERT INTO user (login,pass,data) VALUES('$konto','$password','$data')";
   mysql_query($zapytanie) or die("Wystąpił błąd" );
       echo('Konto '.$konto.' zostalo utworzone');
       echo('Data założenia konta to '.$data.'  ');
       
//       echo "<META HTTP-EQUIV=Refresh CONTENT=\"5; URL=http://dawid.malyzolw.pl/z6/rejilog/login.php\">";
       
        }
   else
   {
   echo("Taki login już jest w bazie");
   }
  }
  else echo ("Podane hasla nie są takie same");
}
else{
    

?>
<html>
<body>
<h1>Dodaj nowego uzytkownika</h1>
<form action="register.php" method="post">
<strong>Nazwa konta:</strong><input name="konto" type="text" value="" /><br>
<strong>Haslo:</strong><input name="password" type="password" value="" /><br>
<strong>Powtorz haslo:</strong><input name="password2" type="password" value="" /><br>
<input type="submit" value="Zarejestruj" />
</form>
</body>
</html>
<?php
    
}
?>