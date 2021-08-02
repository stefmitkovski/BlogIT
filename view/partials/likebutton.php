<?php
$statement = $pdo->prepare('SELECT * FROM likes WHERE postid = :id AND liked_by = :user');
$statement->bindValue(':id', $post['id']);
$statement->bindValue('user', $_SESSION['user']);
$statement->execute();
?>
<a class="btn btn-primary" href="like.php?id=<?php echo $post['id'] ?>">
    <?php if ($statement->rowCount() == 0) : ?>
        Like
    <?php else : ?>
        Unlike
    <?php endif; ?>
</a>