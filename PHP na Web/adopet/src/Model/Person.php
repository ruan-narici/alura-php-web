<?php

class Person {
    protected string $nome;
    protected string $email;
    protected Address $address;
    protected birthDate $birthDate;
    protected Phone $phone;

    public function __construct(string $nome, string $email, Address $address, birthDate $birthDate, Phone $phone) {
        $this->nome = $nome;
        $this->email = $email;
        $this->address = $address;
        $this->birthDate = $birthDate;
        $this->phone = $phone;
    }
}

?>