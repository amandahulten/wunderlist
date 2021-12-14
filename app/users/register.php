<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';

$username = "";
$email = "";
$errors = [];

if (isset($_POST['reg_user'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRep = $_POST['passwordRep'];

    if (empty($email)) {
        array_push($errors, "Username is required");
    }

    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if ($password != $passwordRep) {
        array_push($errors, "The two passwords do not match");
    }

    $user_check = $database->prepare("SELECT * FROM users WHERE email = '$email' LIMIT 1");
    $user_check->bindParam(':email', $email, PDO::PARAM_STR);


    $result = $user_check->fetch(PDO::FETCH_OBJ);


    // $result->query($database, $user_check);
    // $user = $result->fetch(PDO::FETCH_ASSOC);

    if (empty($result)) {
        $query = $database->prepare("INSERT INTO users (email, password) VALUES('$email', '$password')");

        $query->execute();
        redirect('/login.php');
    }

    // if (count($errors) == 0) {
    //     $passwordSecure = md5($password);

    //     $statement = $database->prepare("INSERT INTO users (email, password) VALUES('?, ?')");
    // }
}



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
