<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';



if (isset($_POST['title'], $_POST['description'], $_POST['deadline'])) {
    $listId = $_GET['id'];
    $title = trim(filter_var($_POST['title']));
    $description = trim(filter_var($_POST['description']));
    $deadline = $_POST['deadline'];
    $userId = $_SESSION['user']['id'];
    $createdAt = date('Y.m.d');

    if (empty($title) || empty($deadline)) {
        $_SESSION['errors'][] = "You need to fill in all fields";
        redirect('/individual-list.php?id=' . $listId);
    }

    $statement = $database->prepare('INSERT INTO tasks (list_id, user_id, title, description, completed_by, created_at)
    VALUES (:list_id, :user_id, :title, :description, :completed_by, :created_at)');
    $statement->bindParam(':list_id', $listId, PDO::PARAM_INT);
    $statement->bindParam(':user_id', $userId, PDO::PARAM_INT);
    $statement->bindParam(':title', $title, PDO::PARAM_STR);
    $statement->bindParam(':description', $description, PDO::PARAM_STR);
    $statement->bindParam(':completed_by', $deadline, PDO::PARAM_STR);
    $statement->bindParam(':created_at', $createdAt, PDO::PARAM_INT);
    $statement->execute();
}

redirect('/individual-list.php?id=' . $listId);
