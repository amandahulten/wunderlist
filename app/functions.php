<?php

declare(strict_types=1);

function redirect(string $path)
{
    header("Location: ${path}");
    exit;
}

function isUserLoggedIn(): bool
{
    $loggedIn = isset($_SESSION['user']);
    return $loggedIn;
}


function getUncompletedTasks($database): array
{
    $id = $_SESSION['user']['id'];

    $statement = $database->query('SELECT * FROM tasks WHERE user_id = :user_id AND completed_at IS NULL');
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->execute();

    $allTasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $allTasks;
}

function getCompletedTasks($database): array
{

    $id = $_SESSION['user']['id'];

    $statement = $database->query('SELECT * FROM tasks WHERE user_id = :user_id AND completed_at IS NOT NULL');
    $statement->bindParam(':user_id', $id, PDO::PARAM_INT);
    $statement->execute();

    $allTasks = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $allTasks;
}

function getTodaysTasks($database): array
{

    $id = $_SESSION['user']['id'];


    $statement = $database->query('SELECT * FROM tasks WHERE completed_by = DATE() AND user_id = :user_id ');
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
