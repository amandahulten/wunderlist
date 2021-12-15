<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['email'], $_POST['password'])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION['errors'][] = "You need to fill in all fields";
        redirect('/login.php');
    }


    $statement = $database->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();


    $user = $statement->fetch(PDO::FETCH_ASSOC);


    if (!$user) {
        $_SESSION['errors'][] = "That email does not belong to any account.";
        redirect('/login.php');
    }

    if (isset($user['password']) && password_verify($password, $user['password'])) {
        $_SESSION['user'] = [
            'email' => $user['email'],
            'username' => $user['username'],
            'id' => $user['id'],
            'avatar' => $user['avatar']
        ];
        redirect('/');
    }
    $_SESSION['errors'][] = "The email or password is wrong";
    redirect('/login.php');
}


redirect('/login.php');
