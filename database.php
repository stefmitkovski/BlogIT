<?php

$pdo = new PDO('mysql:host=localhost;port=3306;dbname=blogit','test','password');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

return $pdo;
?>