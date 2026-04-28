<?php
require_once __DIR__ . '/db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Check if ID exists and is valid
    if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
        header("Location:index.php?status=error&message=Invalid ID");
        exit();
    }

    $id = (int) $_POST['id'];

    try {
        $sql = "DELETE FROM students WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$id]);

        // Check if a row was actually deleted
        if ($stmt->rowCount() > 0) {
            header("Location:index.php?status=success");
        } else {
            header("Location:index.php?status=error&message=Record not found");
        }
        exit();

    } catch (PDOException $e) {
        // Hide raw error in production
        header("Location:index.php?status=error");
        exit();
    }
}
?>