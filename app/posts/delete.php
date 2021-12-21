<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['task-id'])) {
    $taskId = trim(filter_var($_POST['task-id'], FILTER_SANITIZE_STRING));

    $statement = $database->prepare("DELETE FROM tasks WHERE id = :id");
    $statement->bindParam(':id', $taskId, PDO::PARAM_INT);
    $statement->execute();

    redirect('/');
}

redirect('/');


    // if ($userId !== $id) {
    //     $_SESSION['errors'][] = "You can't delete this task since it's not yours";
    //     redirect('/');
    // }
