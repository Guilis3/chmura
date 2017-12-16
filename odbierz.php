<?php
    session_start();
$lok = $_SESSION['myvar'];
    ?>
<?php
if($_COOKIE['login'] == 'zalogowany')
{
$max_rozmiar = 1000;
if (is_uploaded_file($_FILES['plik']['tmp_name']))
{
if ($_FILES['plik']['size'] > $max_rozmiar) {echo "Przekroczenie rozmiaru $max_rozmiar"; }
else
{
 //<script type="text/javascript">window.location.href ='main.php';</script>
echo 'Odebrano plik: '.$_FILES['plik']['name'].'<br/>';
if (isset($_FILES['plik']['type'])) {echo 'Typ: '.$_FILES['plik']['type'].'<br/>'; }
move_uploaded_file($_FILES['plik']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/z7/'. $lok .$_FILES['plik']['name']);
}}
else {echo 'Błąd przy przesyłaniu danych!';}
}else{
echo 'Niezalogowany!!  <a href="index.html">zaloguj</a>';}
?>
