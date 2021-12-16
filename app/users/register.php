<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';


if (isset($_POST['email'], $_POST['password'], $_POST['username'])) {
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));

    if (empty($email) || empty($password) || empty($username)) {
        $_SESSION['errors'][] = "You need to fill in all fields.";
        redirect('/register.php');
    }

    $statement = $database->prepare('SELECT email FROM users WHERE email = :email');
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->execute();
    $compareEmail = $statement->fetch(PDO::FETCH_ASSOC);
    if ($compareEmail !== false) {
        $_SESSION['errors'][] = "This email aldready exists, try another one.";
        redirect('/register.php');
    }

    $statement = $database->prepare('SELECT username FROM users WHERE username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    $compareUsername = $statement->fetch(PDO::FETCH_ASSOC);
    if ($compareUsername !== false) {
        $_SESSION['errors'][] = "This username already exist, try another one.";
        redirect('/register.php');
    }


    $query = "INSERT INTO users (email, password, username) VALUES (:email, :password, :username)";
    $statement = $database->prepare($query);
    $statement->bindParam(':email', $email, PDO::PARAM_STR);
    $statement->bindParam(':password', $password, PDO::PARAM_STR);
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    $statement = $database->prepare('SELECT * FROM users WHERE username = :username');
    $statement->bindParam(':username', $username, PDO::PARAM_STR);
    $statement->execute();

    $user = $statement->fetch(PDO::FETCH_ASSOC);


    $_SESSION['user'] = [
        'email' => $user['email'],
        'username' => $user['username'],
        'id' => $user['id']
    ];

    redirect('/');
}

redirect('/register.php');




// $email = $_POST['email'];
// $password = $_POST['password'];
// // $passwordRep = $_POST['passwordRep'];


// $statement = $database->prepare(('INSERT INTO users(email, password) VALUES(?, ?)'));

// $statement->bindParam($email, $password, PDO::PARAM_STR);
// $statement->execute();
// echo "Registration Sucess";


// if (isset($_POST['submit'])) {

//     // $name = $_POST['name'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $passwordrep = $_POST['passwordrep'];

//     require_once 'functions.php';

//     if (emptyInputSignup($email, $password, $passwordrep) !== false) {
//         header("location: ../../register.php?error=emptyinput");
//         exit();
//     }

//     if (invalidEmail($email) !== false) {
//         header("location: ../../register.php?error=invalidemail");
//         exit();
//     }

//     if (passwordMatch($password, $passwordrep) !== false) {
//         header("location: ../../register.php?error=passworddifferent");
//         exit();
//     }

//     if (correctPassword($password) !== false) {
//         header("location: ../../register.php?error=correctPassword");
//         exit();
//     }

//     createUser($connection, $email, $password, $passwordrep);
// } else {
//     header("location: ../../register.php");
//     exit();
// }
