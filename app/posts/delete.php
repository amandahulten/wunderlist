<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['id'], $_POST['user_id'])) {
    $taskId = trim(filter_var($_POST['id'], FILTER_SANITIZE_STRING));
    $userId = trim(filter_var($_POST['user_id'], FILTER_SANITIZE_STRING));
    $id = $_SESSION['user']['id'];

    if ($userId !== $id) {
        $_SESSION['errors'][] = "You can't delete this task since it's not yours";
        redirect('/');
    }

    $statement = $database->prepare("DELETE FROM tasks WHERE id = :id");
    $statement->bindParam(':id', $taskId, PDO::PARAM_INT);
    $statement->execute();
}

redirect('/');
