<?php

class LegalPerson extends Person implements JsonSerializable{

    private Cnpj $cnpj;

    public function __construct(string $name, string $email, Address $address, birthDate $birthDate, Phone $phone, Cnpj $cnpj) {
        parent::__construct($name, $email, $address, $birthDate, $phone);
        $this->cnpj = $cnpj;
    }

    public function jsonSerialize(): mixed {
        return [
            "nome" => $this->name,
            "email" => $this->email,
            "cnpj" => $this->cnpj->getCnpj(),
            "cep" => $this->address->getCep(),
            "cidade" => $this->address->getCity(),
            "estado" => $this->address->getState(),
            "logradouro" => $this->address->getPublicPlace(),
            "bairro" => $this->address->getNeighborhood(),
            "numero" => $this->address->getNumber(),
            "data-nascimento" => $this->birthDate->getDate(),
            "telefone" => $this->phone->getPhone()
        ];
    }
}

?>