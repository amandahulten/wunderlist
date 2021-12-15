<?php

declare(strict_types=1);

require __DIR__ . '/../autoload.php';



unset($_SESSION['user']);
session_destroy();


redirect('/../index.php');
