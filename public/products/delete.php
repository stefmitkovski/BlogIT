<?php require_once '../../view/partials/header.php';
require_once '../../database.php';
require_once '../../view/partials/checkloggedin.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: home.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    $user = $_SESSION['user'];
    $statement = $pdo->prepare('DELETE FROM posts WHERE id = :id AND created_by = :user');
    $statement->bindValue(':id', $id);
    $statement->bindValue(':user', $user);
    $statement->execute();
    header('Location: home.php');
    exit;
}
