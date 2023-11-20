<?php
require_once ('connect.php');

$question = trim(htmlspecialchars($_POST['question']));
$answer = trim(htmlspecialchars($_POST['answer']));
$date = date("d-m-Y");

$mysql->query("INSERT INTO `game_lw_questions` (`question`, `answer`, `date`) VALUES ('$question', '$answer', '$date')");
$mysql->close();

header('Location: ../../insert.php');
?>