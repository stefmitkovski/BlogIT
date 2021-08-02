<?php
require_once '../../view/partials/navbar.php';
require_once '../../database.php';
require_once '../../view/partials/checkloggedin.php';
?>
<br><br><br>
<?php
$statement = $pdo->prepare('SELECT * FROM posts');
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) :

    $statement = $pdo->prepare('SELECT image FROM PostImages WHERE postid = :id');
    $statement->bindValue(':id', $post['id']);
    $statement->execute();
    if ($statement->rowCount() == 0) {
        $images = null;
    } else {
        $images = $statement->fetchAll(PDO::FETCH_ASSOC);
    }
?>
    <div class="row pt-3">
        <div class="col-md-3"></div>
        <div class="col-md-6">
            <div class="container shadow-lg py-5 bg-body rounded-start">
                <div style="transform: rotate(0);">
                    <a href="posts.php?id=<?php echo $post['id']; ?>" class="stretched-link"></a>
                    <h3 class="text-center"><?php echo $post['title']; ?></h3>
                    <p class="text-start"><?php echo $post['body']; ?></p>
                    <?php if (!is_null($images)) : ?>
                        <?php foreach ($images as $image) : ?>
                            <img src="<?php echo $image['image']; ?>" height=90px weight=90px>
                        <?php endforeach; ?>
                        <br><br>
                    <?php endif; ?>
                    <p class="text-start float-start">Author: <?php echo $post['created_by']; ?></p>
                    <p class="text-end float-end">Posted: <?php echo $post['created_date']; ?></p>
                    <p><br></p>
                </div>
                <?php require '../../view/partials/likebutton.php' ?>
                <?php if ($post['created_by'] == $_SESSION['user']) : ?>
                    <a class="btn btn-secondary" href="update.php?id=<?php echo $post['id'] ?>" class="btn btn-secondary">Edit</a>
                    <a href="delete.php?id=<?php echo $post['id'] ?>" class="btn btn-danger">Delete</a>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-3"></div>
    </div>
<?php endforeach; ?>
</body>

</html>