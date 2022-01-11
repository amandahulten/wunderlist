<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['task-id'], $_POST['list-id'])) {
    $taskId = $_POST['task-id'];
    $listId = $_POST['list-id'];
    $unCompleted = null;
    $userId = $_SESSION['user']['id'];

    $statement = $database->prepare("UPDATE tasks SET completed_at = :completed_at WHERE id = :id AND user_id = :user_id");
    $statement->bindParam(':id', $taskId, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':completed_at', $unCompleted, PDO::PARAM_STR);
    $statement->execute();

    $_SESSION['completed'][] = "Task moved to uncompleted tasks!";

    redirect('/individual-list.php?id=' . $listId);
}
