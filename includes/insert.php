<?php

require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: index.php');
    exit();
}


$name        = trim($_POST['name'] ?? '');
$surname     = trim($_POST['surname'] ?? '');
$middlename  = trim($_POST['middlename'] ?? '');
$address     = trim($_POST['address'] ?? '');
$contact     = trim($_POST['contact'] ?? '');

if ($name === '' || $surname === '') {
    header('Location: index.php?status=error&message=Required fields missing');
    exit();
}

try {
    $sql = "INSERT INTO students 
            (name, surname, middlename, address, contact_number) 
            VALUES (:name, :surname, :middlename, :address, :contact)";

    $stmt = $pdo->prepare($sql);

    $stmt->execute([
        ':name'       => $name,
        ':surname'    => $surname,
        ':middlename' => $middlename,
        ':address'    => $address,
        ':contact'    => $contact
    ]);

    header('Location: index.php?status=success');
    exit();

} catch (PDOException $e) {

    error_log($e->getMessage());

    header('Location: index.php?status=error&message=Database error');
    exit();
}