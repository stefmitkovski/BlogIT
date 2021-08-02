<?php require_once '../../view/partials/header.php';
require_once '../../database.php';
require_once '../../view/partials/checkloggedin.php';

$id = $_GET['id'] ?? null;

if(!$id){
    header('Location: home.php');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == "GET"){
    $user = $_SESSION['user'];
    $statement = $pdo->prepare('SELECT * FROM likes WHERE liked_by = :user AND postid = :id');
    $statement->bindValue(':user',$user);
    $statement->bindValue(':id',$id);
    $statement->execute();
    if($statement->rowCount() == 1){
        $statement = $pdo->prepare('DELETE FROM likes WHERE liked_by = :user AND postid = :id');
    }else if($statement->rowCount() == 0){
        $statement = $pdo->prepare('INSERT INTO likes (liked_by, postid) VALUES (:user,:id)');
    }else{
        header('Location: home.php');
        exit;
    }
    $statement->bindValue(':user',$user);
    $statement->bindValue(':id',$id);
    $statement->execute();

    header('Location: home.php');
    exit;
}
