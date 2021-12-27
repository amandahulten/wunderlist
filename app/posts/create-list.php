<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['list-name'])) {
    $listName = trim(filter_var($_POST['list-name']));
    $userId = $_SESSION['user']['id'];

    if (empty($listName)) {
        $_SESSION['errors'][] = "You need to fill in all fields";
        redirect('/');
    }

    $statement = $database->prepare('INSERT INTO lists (user_id, title) VALUES (:user_id, :title)');
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':title', $listName, PDO::PARAM_STR);
    $statement->execute();
}

redirect('/');
