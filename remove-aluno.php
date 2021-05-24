<?php

require_once 'vendor/autoload.php';
use Alura\Pdo\Domain\Model\Student;

$databasePath = __DIR__ . '/database.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$preparedStatement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
$preparedStatement->bindValue(1, 2, PDO::PARAM_INT);
var_dump($preparedStatement->execute());