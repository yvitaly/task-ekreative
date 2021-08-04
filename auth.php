<?php
session_start();

include ('db_connect.php');



$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

$dbh = connect();

$result = $dbh->query(" SELECT * FROM `users` WHERE `email` = '$email' and password = '$password'");
$users = $result->fetchAll();

if(empty($users))
{
    $_SESSION['errors'] = ['No user found'];
    header('Location: index.php');
    exit();
}

$user = $users[0];
if ($user['role'] === ROLE_ADMIN)
{
    $_SESSION['admin'] = true;
}
$_SESSION['is_logged_in'] = true;
header('Location: posts.php');

?>