<?php require_once '../../view/partials/header.php';
require_once '../../database.php';
require_once '../../random.php';
require_once '../../view/partials/checkloggedin.php';

// Note add multi image upload

$user = $_SESSION['user'];
$title = '';
$body = '';
$date = date('Y-m-d H:i:s');
$unique = randomString(8);
$errors = [];
$extension=array("jpeg","jpg","png");

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title = $_POST['title'];
    $body = $_POST['body'];

    if (!is_dir('../public/images')) {
        mkdir('../public/images');
    }
    
    if(!$title){
        $errors[] = 'Title is required';
    }else if(strlen($title) > 255){
        $errors[] = 'The title you enter is to long';
    }

    if(!$body){
        $errors[] = 'Body is required';
    }else if(strlen($body) > 255){
        $errors[] = 'The body you enter is to long';
    }
    
    
    if(empty($errors)){
    $statement = $pdo->prepare('INSERT INTO posts (title,body, created_date, created_by)
                                    VALUES (:title, :body, :date, :created_by)');
        $statement->bindValue(':title',$title);
        $statement->bindValue(':body',$body);
        $statement->bindValue(':date',$date);
        $statement->bindValue(':created_by', $user);
        $statement->execute();
        if($statement){

            $prev = $pdo->prepare('SELECT id FROM posts WHERE title = :title AND body = :body AND created_date = :created_date AND created_by = :created_by ');
            $prev->bindValue(':title',$title);
            $prev->bindValue(':body',$body);
            $prev->bindValue(':created_date',$date);
            $prev->bindValue(':created_by',$user);
            $prev->execute();
            $postid = $prev->fetch(PDO::FETCH_ASSOC);

            foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {
                $file_name=$_FILES["files"]["name"][$key];
                $file_tmp=$_FILES["files"]["tmp_name"][$key];
                $ext=pathinfo($file_name,PATHINFO_EXTENSION);
        
                if(in_array($ext,$extension)) {
                    $imagePath = '../images/' . $unique . '/' . $file_name;
                    mkdir(dirname($imagePath));
                    move_uploaded_file($file_tmp,$imagePath);

                    $insert = $pdo->prepare('INSERT INTO PostImages (postid,image)
                                             VALUES (:postid, :image)');
                    $insert->bindValue(':postid',$postid['id']);
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
}


?>


<body>
    <?php require_once '../../view/products/create-form.php'; ?>
</body>