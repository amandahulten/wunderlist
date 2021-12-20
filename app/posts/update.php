<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['new-title'], $_POST['new-description'], $_POST['new-deadline'])) {
    $newTitle = trim(filter_var($_POST['new-title']));
    $newDescription = trim(filter_var($_POST['new-description']));
    $newDeadline = $_POST['new-deadline'];
    $taskId = $_SESSION['task']['id'];


    $statement = $database->prepare('UPDATE tasks SET title = :title WHERE id = :id');
    $statement->bindParam(':title', $newTitle, PDO::PARAM_STR);
    $statement->bindParam(':id', $taskId, PDO::PARAM_STR);
    $statement->execute();

    $statement = $database->prepare('UPDATE tasks SET description = :description WHERE id = :id');
    $statement->bindParam(':description', $newDescription, PDO::PARAM_STR);
    $statement->bindParam(':id', $taskId, PDO::PARAM_STR);
    $statement->execute();

    $statement = $database->prepare('UPDATE tasks SET completed_by = :completed_by WHERE id = :id');
    $statement->bindParam(':completed_by', $newDeadline, PDO::PARAM_STR);
    $statement->bindParam(':id', $taskId, PDO::PARAM_STR);
    $statement->execute();

    redirect('/');
}

redirect('/update.php');
