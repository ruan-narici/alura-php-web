<?php

class LegalPerson extends Person {

    private string $cnpj;

    public function __construct(string $nome, string $email, Address $address, birthDate $birthDate, Phone $phone, string $cnpj) {
        parent::__construct($nome, $email, $address, $birthDate, $phone);
        $this->cnpj = $cnpj;
    }
}

?>