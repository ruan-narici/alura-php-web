<?php

class PhysicalPerson extends Person {
    
    private string $cpf;

    public function __construct(string $nome, string $email, Address $address, birthDate $birthDate, Phone $phone, string $cpf) {
        parent::__construct($nome, $email, $address, $birthDate, $phone);
        $this->cpf = $cpf;
    }
}

?>