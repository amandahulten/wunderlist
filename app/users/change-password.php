<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['current-password'], $_POST['new-password'])) {
    $currentPassword = $_POST['current-password'];
    $newPassword = $_POST['new-password'];
    $newHachedPassword = password_hash($_POST['new-password'], PASSWORD_DEFAULT);
    $id = $_SESSION['user']['id'];

    // Checks if new password is equal to new password
    if ($currentPassword === $newPassword) {
        echo "You typed the same password in both fields";
        redirect('/profile.php');
    }

    // Checks if any field is empty
    if (empty($currentPassword) || empty($newPassword)) {
        $_SESSION['errors'][] = "You need to fill in all fields";
        redirect('/profile.php');
    }

    $query = "SELECT password FROM users WHERE id = :id";
    $statement = $database->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_STR);
    $statement->execute();

    $password = $statement->fetch(PDO::FETCH_ASSOC);

    if (!password_verify($currentPassword, $password['password'])) {
        $_SESSION['errors'][] = "Wrong password, please try again";
        redirect('/profile.php');
    }

    $query = "UPDATE users SET password = :password WHERE id = :id";
    $statement = $database->prepare($query);
    $statement->bindParam(':id', $id, PDO::PARAM_INT);
    $statement->bindParam(':password', $newHachedPassword, PDO::PARAM_STR);
    $statement->execute();

    $_SESSION['completed'][] = "Password updated!";
    redirect('/');
}


redirect('/profile.php');
