<?php
require 'config.php';

$stmt = $pdo->prepare("DELETE FROM students WHERE id = :id");
$stmt->execute(['id' => $_GET['id']]);

header('Location: index.php');
exit;
