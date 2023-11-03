<?php

class PhysicalPerson extends Person implements JsonSerializable{
    
    private Cpf $cpf;

    public function __construct(string $name, string $email, Address $address, birthDate $birthDate, Phone $phone, Cpf $cpf) {
        parent::__construct($name, $email, $address, $birthDate, $phone);
        $this->cpf = $cpf;
    }

    public function jsonSerialize(): mixed {
        return [
            "nome" => $this->name,
            "email" => $this->email,
            "cnpj" => $this->cpf->getCpf(),
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