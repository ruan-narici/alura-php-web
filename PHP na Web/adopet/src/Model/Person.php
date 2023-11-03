<?php

class Person {
    protected string $name;
    protected string $email;
    protected Address $address;
    protected birthDate $birthDate;
    protected Phone $phone;

    public function __construct(string $name, string $email, Address $address, birthDate $birthDate, Phone $phone) {
        $this->name = $name;
        $this->email = $email;
        $this->address = $address;
        $this->birthDate = $birthDate;
        $this->phone = $phone;
    }
}

?>