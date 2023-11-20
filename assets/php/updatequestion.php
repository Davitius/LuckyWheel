<?php
require_once ('connect.php');

$id = $_POST['id'];
$question = trim(htmlspecialchars($_POST['question']));
$answer = trim(htmlspecialchars($_POST['answer']));
$date = date("d-m-Y");

$mysql->query("UPDATE `game_lw_questions` SET `question`='".$question."', `answer`='".$answer."', `date`='".$date."' WHERE `id` = '".$id."'");
$mysql->close();

header('Location: ../../insert.php');
?>