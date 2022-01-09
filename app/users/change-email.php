<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['new-email'])) {
    $newEmail = trim(filter_var($_POST['new-email'], FILTER_SANITIZE_EMAIL));
    $id = $_SESSION['user']['id'];

    // Check if field is empty
    if (empty($newEmail)) {
        $_SESSION['errors'][] = "You need to fill in all fields";
        redirect('/profile.php');
    }

    // Checks that new email is not the same as current email
    if ($newEmail === $_SESSION['user']['email']) {
        $_SESSION['errors'][] = "This email is already registered on your account.";
        redirect('/profile.php');
    }

    //Checks for valid email
    if (filter_var($newEmail, FILTER_VALIDATE_EMAIL) === false) {
        $_SESSION['errors'][] = "This email is not valid, please try again.";
        redirect('/profile.php');
    }

    $statement = $database->prepare('SELECT email FROM users WHERE email = :email');
    $statement->bindParam(':email', $newEmail, PDO::PARAM_STR);
    $statement->execute();
    $compareEmail = $statement->fetch(PDO::FETCH_ASSOC);
    // Checks if email already exists
    if ($compareEmail !== false) {
        $_SESSION['errors'][] = "This email aldready exists, try another one.";
        redirect('/profile.php');
    }

    $query = "UPDATE users SET email = :email WHERE id = :id";
    $statement = $database->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':email', $newEmail, PDO::PARAM_STR);
    $statement->execute();

    $_SESSION['completed'][] = "Email updated!";
    redirect('/profile.php');
}

redirect('/profile.php');
