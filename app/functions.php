<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}


function getAllTasks($id, $database): array
{
    $statement = $database->query('SELECT * FROM tasks WHERE user_id = :user_id');
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->execute();

    $allTasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $allTasks;
}
