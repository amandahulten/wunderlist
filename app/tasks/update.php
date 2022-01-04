<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$listId = $_GET['id'];
$taskId = $_GET['task_id'];
$userId = $_SESSION['user']['id'];

if (isset($_POST['new-title'])) {
    $newTitle = trim(filter_var($_POST['new-title']));
}

if ($newTitle) {
    $statement = $database->prepare('UPDATE tasks SET title = :title WHERE id = :id AND list_id = :list_id AND user_id = :user_id');
    $statement->bindParam(':title', $newTitle, PDO::PARAM_STR);
    $statement->bindParam(':id', $taskId, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $listId, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->execute();
}


if (isset($_POST['new-description'])) {
    $newDescription = trim(filter_var($_POST['new-description']));
}

if ($newDescription) {
    $statement = $database->prepare('UPDATE tasks SET description = :description WHERE id = :id AND list_id = :list_id AND user_id = :user_id');
    $statement->bindParam(':description', $newDescription, PDO::PARAM_STR);
    $statement->bindParam(':id', $taskId, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $listId, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->execute();
}


if (isset($_POST['new-deadline'])) {
    $newDeadline = $_POST['new-deadline'];
}

if ($newDeadline) {
    $statement = $database->prepare('UPDATE tasks SET completed_by = :completed_by WHERE id = :id AND list_id = :list_id AND user_id = :user_id');
    $statement->bindParam(':completed_by', $newDeadline, PDO::PARAM_STR);
    $statement->bindParam(':id', $taskId, PDO::PARAM_INT);
    $statement->bindParam(':list_id', $listId, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->execute();
}

redirect('/individual-list.php?id=' . $listId);
