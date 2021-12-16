<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

if (isset($_FILES['avatar'])) {
    $avatar = $_FILES['avatar'];
    $avatarName = date('ymd') . '-' . ($avatar['name']);


    $uploadPath = __DIR__ . '/../../uploads/';
    $destination = $uploadPath . $avatarName;
    move_uploaded_file($avatar['tmp_name'], $destination);

    if (!in_array($avatar['type'], ['image/jpeg', 'image/png'])) {
        $_SESSION['errors'][] = "The uploaded file type is not allowed.";
        redirect('/profile.php');
    }

    if ($avatar['size'] >= 20000000) {
        $_SESSION['errors'][] = "Your file is to big. Try a smaller file.";
        redirect('/profile.php');
    }

    $query = "UPDATE users SET avatar = :avatar WHERE id = :id";
    $statement = $database->prepare($query);
    $statement->bindParam(':id', $_SESSION['user']['id'], PDO::PARAM_INT);
    $statement->bindParam(':avatar', $avatarName, PDO::PARAM_STR);
    $statement->execute();


    $_SESSION['user']['avatar'] = $avatarName;
}

redirect('/profile.php');
