<?php

namespace ruannarici\Pdo\Domain\Model;

use DateTime;
use DateTimeImmutable;

class Student {
    private ?int $id;
    private string $name;
    private DateTimeImmutable $birthDate;
    /** @var Phone[] */
    private array $phones = [];

    
    public function __construct(?int $id, string $name, DateTimeImmutable $birthDate){
        $this->id = $id;
        $this->name = $name;
        $this->birthDate = $birthDate;
    }

    public function getId(): ?int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function getBirthDate(): DateTimeImmutable {
        return $this->birthDate;
    }

    public function setBirthDate(DateTimeImmutable $birthDate): void {
        $this->birthDate = $birthDate;
    }

    public function age(): int {
        return $this->birthDate
        ->diff(new DateTimeImmutable) // Diferença com base na data atual
        ->y; // Y = Years
    }

    public function addPhone(Phone $phone): void {
        array_push($this->phones, $phone);
    }

    /** @return Phone[] */
    public function getPhones(): array {
        return $this->phones;
    }
}
?>