<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';

$student = new Student(
    null,
    'Diego Souza',
    new \DateTimeImmutable('1996-05-30')
);

echo $student->age();
