<?php
session_start();

$text = $_POST['text'];

$pdo = new PDO("mysql:host=localhost;dbname=my_project;", "root", "root");

$sql = "SELECT * FROM my_table WHERE text=:text";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);
$task = $statement->fetch(PDO::FETCH_ASSOC);
// var_dump($task);die;

if(!empty($task)) {
    $message = "Такая запись уже имеется в базе данных!";
    $_SESSION['danger'] = $message;
    header ("Location: /task_10.php");
    exit;
}

$sql = "INSERT INTO my_table (text) VALUES (:text)";
$statement = $pdo->prepare($sql);
$statement->execute(['text' => $text]);

header ("Location: /task_10.php");

// var_dump($_POST);