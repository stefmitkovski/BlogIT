<?php

require_once '../../view/partials/navbar.php';
require_once '../../database.php';
require_once '../../view/partials/checkloggedin.php';

$statement = $pdo->prepare('SELECT * FROM users WHERE username = :username');
$statement->bindValue(':username', $_SESSION['user']);
$statement->execute();
$user = $statement->fetch(PDO::FETCH_ASSOC);
?>

<div class="container pt-5">
    <div class="row pt-5">
        <div class="row pt-2">
            <div class="col-md-5">
                <img style="height: 350px; width: 300px;" src="<?php echo $user['image'] ?>" alt='avatar' ?>
            </div>
            <div class="col-md-6 ">
                <div class="row">
                    <div class="col-md-12">
                        <p>Name</p>
                        <h5><?php echo $user['name'] ?></h5>
                    </div>
                    <div class="col-md-12">
                        <p>Surname</p>
                        <h5><?php echo $user['surname'] ?></h5>
                    </div>
                    <div class="col-md-12">
                        <p>Email</p>
                        <h5><?php echo $user['email'] ?></h5>
                    </div>
                    <div class="col-md-12">
                        <p>Username</p>
                        <h5><?php echo $user['username'] ?></h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>