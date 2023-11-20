<?php
require_once ('connect.php');


//public function getIp() {
//    $keys = [
//        'HTTP_CLIENT_IP',
//        'HTTP_X_FORWARDED_FOR',
//        'REMOTE_ADDR'
//    ];
//    foreach ($keys as $key) {
//        if (!empty($_SERVER[$key])) {
//            $ip = trim($_SERVER[$key]);
//            if (filter_var($ip, FILTER_VALIDATE_IP)) {
//                return $ip;
//            }
//        }
//    }
//}



//
//    echo getIp();
//    exit();


$name = htmlspecialchars($_POST['addNameInput']);
$score = htmlspecialchars($_POST['addScoreInput']);
$ip = 0;
$date = date("d-m-Y");

$mysql->query("INSERT INTO `game_lw_scores` (`name`, `score`, `ip`, `date`) VALUES ('$name', '$score', '$ip', '$date')");
$mysql->close();

header('Location: ../../index.php');
?>