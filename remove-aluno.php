<?php

require_once 'vendor/autoload.php';
use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

$preparedStatement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
$preparedStatement->bindValue(1, 1, PDO::PARAM_INT);
var_dump($preparedStatement->execute());