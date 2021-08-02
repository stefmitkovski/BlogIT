<?php require_once '../../view/partials/header.php';
require_once '../../database.php';
require_once '../../random.php';

if(isset($_SESSION['user'])){
    session_unset();
    session_destroy();
}

session_start();

$name = '';
$surname = '';
$email = '';
$username = '';
$password = null;
$pconfirm = null;
$file_tmp = null;
$saveTo = '';
$file_name = '';
$uploaded = false;
$errors = [];
$extension=array("jpeg","jpg","png","svg");


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $name = $_POST['name'];
    $surname = $_POST['surname'];
    $email =  $_POST['email'];
    $emailcheck = preg_match('/^[A-Za-z0-9\.]{0,}@[A-Za-z]{0,}\.com/',$email,$emailcheck);
    $username = $_POST['username'];
    $password = $_POST['password'];
    $pconfirm = $_POST['PasswordConfirmation'] ?? null;

    if($password == null || $pconfirm == null || $password != $pconfirm){
        $errors[] = 'The entered password do not match';
    }
    
    $password = password_hash($_POST['password'],PASSWORD_DEFAULT);
    

    if (!is_dir('../public/images')) {
        mkdir('../public/images');
    }
    
    if (!empty($_FILES['profile-image']['tmp_name'])){
        $file_name=$_FILES['profile-image']['name'];
        $file_tmp=$_FILES['profile-image']['tmp_name'];
        $ext=pathinfo($file_name,PATHINFO_EXTENSION);
        $uploaded = true;
    }else if(isset($_POST['profile-image'])){
        $file_name = $_POST['profile-image'];
        $file_tmp = '../images/'.$file_name.'.svg';
        $ext = 'svg';
    }else{
        $errors[] = 'You forgot to select a profile image';
    }

    if($file_tmp != null && $uploaded){
        $saveTo = '../images/' . randomString(8) . '/' . $file_name;
        mkdir(dirname($saveTo));
        move_uploaded_file($file_tmp,$saveTo);
    }

    if($file_tmp != null && !$uploaded){
        $saveTo = '../images/' . randomString(8) . '/'.$file_name . '.svg';
        mkdir(dirname($saveTo));
        copy($file_tmp,$saveTo);
    }

    if(!$name){
        $errors[] = 'Name is required';
    }else if(strlen($name) > 255){
        $errors[] = 'The name you enter is to long';
    }

    if(!$surname){
        $errors[] = 'Surname is required';
    }else if(strlen($surname) > 255){
        $errors[] = 'The surname you enter is to long';
    }

    if(!$email || $emailcheck == 0){
        $errors[] = 'A vailid email address is required';
    }else if(strlen($email) > 255){
        $errors[] = 'The name you enter is to long';
    }

    if(!$password){
        $errors[] = 'Password is required';
    }else if(strlen($password) > 255 || strlen($password) < 6){
        $errors[] = "The entered password isn't the right size";
    }



    if(!$username){
        $errors[] = 'Username is required';
    }else if(strlen($username) > 255 || strlen($username) < 6){
        $errors[] = "The entered username isn't the right size";
    }

    $check = $pdo->prepare('SELECT * FROM users WHERE username = :username');
    $check->bindValue(':username',$username);
    $check->execute();
    if($check->rowCount() > 0){
        $errors = 'This username is taken please enter a new one';
    }

    if(empty($errors)){
        $statemant = $pdo->prepare('INSERT INTO users (username,name,surname,email,password,created_at, image) 
                                    values (:username, :name, :surname, :email, :password, :date, :image)');
        $statemant->bindValue(':username',$username);
        $statemant->bindValue(':name',$name);
        $statemant->bindValue(':surname',$surname);
        $statemant->bindValue(':email',$email);
        $statemant->bindValue(':password',$password);
        $statemant->bindValue(':date',date('Y-m-d H:i:s'));
        $statemant->bindValue(':image',$saveTo);
        $statemant->execute();
        if($statemant){
            $_SESSION['user'] = $username;
            $_SESSION['image'] = $saveTo;
            header('Location: home.php');
            exit;
        }
    }
}
?>
<body>
    <?php require_once  '../../view/products/signup-form.php' ?>
</body>
</html>