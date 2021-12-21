<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['email'], $_POST['password'], $_POST['username'])) {
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));

    // $placeholderImg = '../../uploads/placeholder.png';

    if (empty($email) || empty($password) || empty($username)) {
        $_SESSION['errors'][] = "You need to fill in all fields.";
        redirect('/register.php');
    }

    $statement = $database->prepare('SELECT email FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $compareEmail = $statement->fetch(PDO::FETCH_ASSOC);
    if ($compareEmail !== false) {
        $_SESSION['errors'][] = "This email aldready exists, try another one.";
        redirect('/register.php');
    }

    $statement = $database->prepare('SELECT username FROM users WHERE username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $compareUsername = $statement->fetch(PDO::FETCH_ASSOC);
    if ($compareUsername !== false) {
        $_SESSION['errors'][] = "This username already exist, try another one.";
        redirect('/register.php');
    }


    $query = "INSERT INTO users (email, password, username) VALUES (:email, :password, :username)";
    $statement = $database->prepare($query);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    $statement = $database->prepare('SELECT * FROM users WHERE username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);


    $_SESSION['user'] = [
        'email' => $user['email'],
        'username' => $user['username'],
        'id' => $user['id'],
        'avatar' => $user['avatar']
    ];

    redirect('/');
}

redirect('/register.php');
