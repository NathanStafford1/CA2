<?php
    $dsn = 'mysql:host=localhost;dbname=D00236171';
    $username = 'D00236171';
    $password = 'nrguxj9o';

    try {
        $db = new PDO($dsn, $username, $password);
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        include('database_error.php');
        exit();
    }
?>