<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['completed'], $_POST['uncompleted'])) {
    $completed = $_POST['completed'];
    $uncompleted = $_POST['uncompleted'];


    $statement = $database->prepare("INSERT INTO tasks (completed_at) VALUES (:completed_at)");
    $statement->bindParam(':completed_at', $completed, PDO::PARAM_INT);
    $statement->execute();

    redirect('/');
}

redirect('/');
