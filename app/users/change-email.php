<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['current-email'], $_POST['new-email'])) {
    $currentEmail = trim(filter_var($_POST['current-email'], FILTER_SANITIZE_EMAIL));
    $newEmail = trim(filter_var($_POST['new-email'], FILTER_SANITIZE_EMAIL));
    $id = $_SESSION['user']['id'];

    if (empty($currentEmail) || empty($newEmail)) {
        $_SESSION['errors'][] = "You need to fill in all fields";
        redirect('/profile.php');
    }

    if ($currentEmail !== $_SESSION['user']['email']) {
        $_SESSION['errors'][] = "Your current email is incorrect";
        redirect('/profile.php');
    }

    if ($newEmail === $_SESSION['user']['email']) {
        $_SESSION['errors'][] = "This email is already registered on your account.";
        redirect('/profile.php');
    }

    $statement = $database->prepare('SELECT email FROM users WHERE email = :email');
    $statement->bindParam(':email', $newEmail, PDO::PARAM_STR);
    $statement->execute();
    $compareEmail = $statement->fetch(PDO::FETCH_ASSOC);
    if ($compareEmail !== false) {
        $_SESSION['errors'][] = "This email aldready exists, try another one.";
        redirect('/profile.php');
    }

    $query = "UPDATE users SET email = :email WHERE id = :id";
    $statement = $database->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':email', $newEmail, PDO::PARAM_STR);
    $statement->execute();


    redirect('/profile.php');
}

redirect('/profile.php');
