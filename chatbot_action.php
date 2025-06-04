<?php
include("configChatbot.php");

$id = $_REQUEST['qst'];

$sql = "SELECT * FROM `chatbot_answers` WHERE `id`=:id";
$query = $conn->prepare($sql);
$query->bindparam(":id",$id);
$query->execute();
$result = $query->fetch(PDO::FETCH_LAZY);


echo "<h3 class='question'>".$result['question']."</h3>";
echo "<br>";
echo "<h3 class='answer'>".$result['answer']."</h3>";
echo "<br>";
?>