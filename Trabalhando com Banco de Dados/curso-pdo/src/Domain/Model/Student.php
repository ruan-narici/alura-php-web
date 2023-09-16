<?php

namespace ruannarici\Pdo\Domain\Model;

use DateTime;
use DateTimeImmutable;

class Student {
    private ?int $id;
    private string $name;
    private DateTimeImmutable $birthDate;

    public function __construct(?int $id, string $name, DateTimeImmutable $birthDate){
        $this->id = $id;
        $this->name = $name;
        $this->birthDate = $birthDate;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getBirthDate(): DateTimeImmutable {
        return $this->birthDate;
    }

    public function age(): int {
        return $this->birthDate
        ->diff(new DateTimeImmutable) // Diferença com base na data atual
        ->y; // Y = Years
    }
}

?>