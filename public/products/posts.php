<?php
require_once '../../view/partials/navbar.php';
require_once '../../database.php';
require_once '../../view/partials/checkloggedin.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && is_numeric($_GET['id'])) :
    $id = $_GET['id'];
    $statement = $pdo->prepare('SELECT * FROM posts WHERE id = :id');
    $statement->bindValue(':id', $id);
    $statement->execute();
    if ($statement->rowCount() != 1) {
        header('Location: home.php');
        exit;
    }
    $post = $statement->fetch(PDO::FETCH_ASSOC);

    $statement = $pdo->prepare('SELECT image FROM PostImages WHERE postid = :id');
    $statement->bindValue(':id', $post['id']);
    $statement->execute();
    if ($statement->rowCount() == 0) {
        $images = null;
    } else {
        $images = $statement->fetchAll(PDO::FETCH_ASSOC);
    }


?>
    <br><br><br>
    <div class="row pt-3">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <div class="container shadow-lg py-5 bg-body rounded-start">
                <h3 class="text-center"><?php echo $post['title']; ?></h3>
                <p class="text-start py-2"><?php echo $post['body']; ?></p>
                <?php if (!is_null($images)) : ?>
                    <?php foreach ($images as $image) : ?>
                        <img src="<?php echo $image['image']; ?>" height= 90px weight= 90px class="px-1">
                    <?php endforeach; ?>
                    <br><br>
                <?php endif; ?>
                <p class="text-start float-start">Author: <?php echo $post['created_by']; ?></p>
                <p class="text-end float-end">Posted: <?php echo $post['created_date']; ?></p>
                <p><br></p>
                <?php require_once '../../view//partials/likebutton.php' ?>
                <?php if ($post['created_by'] == $_SESSION['user']) : ?>
                    <a href="update.php?id=<?php echo $post['id'] ?>" class="btn btn-secondary">Edit</a>
                    <a href="delete.php?id=<?php echo $post['id'] ?>" class="btn btn-danger">Delete</a>
                <?php endif; ?>
            </div>
        </div>
    </div>

<?php else :
    header('Location: home.php');
    exit;
endif;
?>