<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}


function getAllTasks($database): array
{
    $id = $_SESSION['user']['id'];

    $statement = $database->query('SELECT * FROM tasks WHERE user_id = :user_id');
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->execute();

    $allTasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $allTasks;
}

function getAllLists($database): array
{
    $id = $_SESSION['user']['id'];

    $statement = $database->query('SELECT * FROM lists WHERE user_id = :user_id');
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->execute();

    $allTasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $allTasks;
}

function isUserLoggedIn(): bool
{
    $loggedIn = isset($_SESSION['user']);
    return $loggedIn;
}
