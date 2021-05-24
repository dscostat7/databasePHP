<?php

require_once 'vendor/autoload.php';
use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

$student = new Student(null, 'Vitor Souza', new DateTimeImmutable('2001-03-25'));

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
$statement = $pdo->prepare($sqlInsert); // Preparando o banco de dados para receber as informações seguras, sem sofrer ataque de SQL Injection;
$statement->bindValue(':name', $student->name());
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));

if ($statement->execute()) {
    echo "Aluno adicionado com sucesso!" . PHP_EOL;
};

