<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=my_project;", "root", "root");

$sql = "SELECT * FROM users WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email]);
$users = $statement->fetch(PDO::FETCH_ASSOC);
// var_dump($task);die;

if(!empty($users)) {
    $message = "Такая запись уже имеется в базе данных!";
    $_SESSION['danger'] = $message;
    header ("Location: /page_login.php");
    exit;
}

$sql = "INSERT INTO users (email, password) VALUES (:email, :password)";
$statement = $pdo->prepare($sql);
$statement->execute([
    'email' => $email,
    'password' => $password
]);

    $message = "Регистрация успешно завершена!";
    $_SESSION['success'] = $message;

header ("Location: /page_login.php");

// var_dump($_POST);