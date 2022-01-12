<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['list-id'])) {
    $listId = $_POST['list-id'];
    $userId = $_GET['user']['id'];

    $statement = $database->prepare('DELETE FROM tasks WHERE list_id = :list_id AND user_id = :user_id');
    $statement->bindParam(':list_id', $listId, PDO::PARAM_INT);
    $statement->bindParam('user_id', $userId, PDO::PARAM_INT);
    $statement->execute();

    $statement = $database->prepare("DELETE FROM lists WHERE id = :id");
    $statement->bindParam(':id', $listId, PDO::PARAM_INT);
    $statement->execute();
}

redirect('/');
