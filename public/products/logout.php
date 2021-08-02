<?php
session_start();
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    if(isset($_SESSION['user'])){
        session_unset();
        session_destroy();
    }
}
if (isset($_SERVER["HTTP_REFERER"])) {
    header("Location: " . $_SERVER["HTTP_REFERER"]);
}else{
    header('Location: index.php');
}
exit;
?>