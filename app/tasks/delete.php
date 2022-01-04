<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['task-id'], $_POST['list-id'])) {
    $taskId = $_POST['task-id'];
    $listId = $_POST['list-id'];
    $userId = $_SESSION['user']['id'];

    $statement = $database->prepare("DELETE FROM tasks WHERE id = :id AND list_id = :list_id AND user_id = :user_id");
    $statement->bindParam(':id', $taskId, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $listId, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->execute();

    $_SESSION['completed'][] = "Task deleted succesfully!";

    redirect('/individual-list.php?id=' . $listId);
}
