<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['list-id'])) {
    $listId = $_POST['list-id'];
    $completedDate = date('Y-m-d');
    $userId = $_SESSION['user']['id'];

    $statement = $database->prepare("UPDATE tasks SET completed_at = :completed_at WHERE list_id = :list_id AND user_id = :user_id");
    $statement->bindParam(':list_id', $listId, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':completed_at', $completedDate, PDO::PARAM_STR);
    $statement->execute();


    $_SESSION['completed'][] = "All tasks moved to completed tasks!";

    redirect('/individual-list.php?id=' . $listId);
}
