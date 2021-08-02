<?php require_once '../../view/partials/header.php';
require_once '../../database.php';

if (isset($_SESSION['user'])) {
    session_unset();
    session_destroy();
}
session_start();

if (isset($_GET['redirect']) && $_GET['redirect'] == true) {
    $redirect = true;
}


$username = '';
$password = '';
$errors = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (!$username) {
        $errors[] = 'Username is required';
    }

    if (!$password) {
        $errors[] = 'Password is required';
    }
    if (empty($errors)) {
        $statement = $pdo->prepare('SELECT password, image FROM users WHERE username = :username');
        $statement->bindValue(':username', $username);
        $statement->execute();
        if ($statement->rowCount() == 1) {
            $data = $statement->fetch(PDO::FETCH_ASSOC);
            if (password_verify($password, $data['password'])) {
                $_SESSION['user'] = $username;
                $_SESSION['image'] = $data['image'];
                if ($redirect) {
                    header("Location: create.php");
                }
                header("Location: home.php");
            }
            $errors[] = 'Wrong username or password';
            exit;
        }
    }
}

?>

<body>
<?php require_once '../../view/products/login-form.php'; ?>
</body>
</html>