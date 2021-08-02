<?php require_once '../../view/partials/header.php';
require_once '../../database.php';
require_once '../../random.php';
require_once '../../view/partials/checkloggedin.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: home.php');
    exit;
}

$title = '';
$body = '';
$extension=array("jpeg","jpg","png");
$deleteImages = [];
$errors = [];
$unique =randomString(8);
$statement = $pdo->prepare('SELECT * from posts WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$post = $statement->fetch(PDO::FETCH_ASSOC);

if ($_SESSION['user'] != $post['created_by']) {
    header('Location: home.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM PostImages WHERE postid = :id');
$statement->bindValue(':id', $id);
$statement->execute();
if ($statement->rowCount() == 0) {
    $images = null;
} else {
    $images = $statement->fetchAll(PDO::FETCH_ASSOC);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // var_dump($_POST['delete']);
    // echo "<br>" . count($_POST['delete']);

    $title = $_POST['title'] ?? null;
    $body = $_POST['body'] ?? null;

    if (!$title) {
        $errors[] = 'Title is required';
    }

    if (!$body) {
        $errors[] = 'Body is required';
    }

    if (empty($errors)) {
        if (isset($_POST['delete'])) {
            for ($i = 0; $i < count($_POST['delete']); $i++) {
                $deleteImages[] =  $_POST['delete'][$i];
            }
            foreach ($deleteImages as $deleteImage) {
                $statement = $pdo->prepare('SELECT * FROM PostImages WHERE id = :id');
                $statement->bindValue(':id', $deleteImage);
                $statement->execute();
                $image = $statement->fetch(PDO::FETCH_ASSOC);
                $statement = $pdo->prepare('DELETE FROM PostImages WHERE id = :id');
                $statement->bindValue(':id', $deleteImage);
                $statement->execute();
                unlink($image['image']);
            }
        }

        $statement = $pdo->prepare('UPDATE posts SET title = :title, body = :body WHERE id = :id');
        $statement->bindValue(':title',$title);
        $statement->bindValue(':body',$body);
        $statement->bindValue(':id',$id);
        $statement->execute();

        foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
            $file_name=$_FILES["files"]["name"][$key];
            $file_tmp=$_FILES["files"]["tmp_name"][$key];
            $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    
            if(in_array($ext,$extension)) {
                $imagePath = '../images/' . $unique . '/' . $file_name . '.';
                mkdir(dirname($imagePath));
                move_uploaded_file($file_tmp,$imagePath);

                $insert = $pdo->prepare('INSERT INTO PostImages (postid,image)
                                         VALUES (:postid, :image)');
                $insert->bindValue(':postid',$id);
                $insert->bindValue(':image',$imagePath);
                $insert->execute();
            }
            else {
                continue;  
            }
        }

        header('Location: home.php');
        exit;
    }
}
?>


<body>
    <?php include_once '../../view/products/update-form.php' ?>
</body>
</html>