<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_POST['list-id'])) {
    $listId = $_POST['list-id'];

    $statement = $database->prepare('DELETE FROM tasks WHERE list_id = :list_id');
    $statement->bindParam(':list_id', $listId, PDO::PARAM_INT);
    $statement->execute();

    $statement = $database->prepare("DELETE FROM lists WHERE id = :id");
    $statement->bindParam(':id', $listId, PDO::PARAM_INT);
    $statement->execute();
}

redirect('/');

    // behöver jag kolla om det är rätt id?

    // if ($userId !== $id) {
    //     $_SESSION['errors'][] = "You can't delete this task since it's not yours";
    //     redirect('/');
    // }
