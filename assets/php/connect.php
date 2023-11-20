<?php
$Host = 'localhost';
$DB_UserName = 'root';
$DB_Password = 'root';
$DB_Name = 'luckywheel';

$connect = mysqli_connect($Host, $DB_UserName, $DB_Password, $DB_Name);
if(!$connect){
    die('ბაზასთან კავშირის შეცდომა');
}

$mysql = new mysqli($Host, $DB_UserName, $DB_Password, $DB_Name);
?>

