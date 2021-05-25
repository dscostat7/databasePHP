<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;
use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

$connection->beginTransaction();

try {
    $aStudent = new Student(null, 'Vick Fog', new DateTimeImmutable('2005-04-15'));
    $studentRepository->save($aStudent);

    $anotherStudent = new Student(null, 'Oliver Queen', new DateTimeImmutable('1987-07-02'));
    $studentRepository->save($anotherStudent);
    $connection->commit();

} catch (\RunTimeException $e) {
    echo $e->getMessage() . PHP_EOL;
    $connection->rollBack();
}