<?php

require_once 'vendor/autoload.php';
use Alura\Pdo\Domain\Model\Student;

$databasePath = __DIR__ . '/database.sqlite';
$pdo = new PDO('sqlite:' . $databasePath);

$statement = $pdo->query('SELECT * FROM students');

while ($studentData = $statement->fetch(PDO::FETCH_ASSOC)) {
    $student = new Student($studentData['id'], $studentData['name'], new DateTimeImmutable($studentData['birth_date']));
    echo "A idade é " . $student->age() . PHP_EOL;
}
exit();


$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
$studentList = [];

foreach ($studentDataList as $studentData) {
    $studentList[] = new Student($studentData['id'], $studentData['name'], new DateTimeImmutable($studentData['birth_date']));
}

var_dump($studentList);

// echo $studentList[0]['name'];