<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['today'])) {
    $taskToday = $_POST['today'];

    $statement = $database->prepare("DELETE FROM tasks WHERE id = :id");
    $statement->bindParam(':id', $taskId, PDO::PARAM_INT);
    $statement->execute();

    redirect('/');
}

redirect('/');
