<?php

class Address {
    private string $cep;
    private string $city;
    private string $state;
    private string  $publicPlace;
    private string $neighborhood;
    private string $number;

    public function __construct(string $cep, string $city, string $state, string $publicPlace, string $neighborhood, string $number) {
        $validFormat = $this->validadeFormat($cep);
        if($validFormat === false) {
            header("Location: index.php?erro=Endereco");
            die();
        }
        
        $this->cep = $this->cleanFormat($cep);
        $this->city = $city;
        $this->state = $state;
        $this->publicPlace = $publicPlace;
        $this->neighborhood = $neighborhood;
        $this->number = $number;
    }

    public function getCep(): string {
        return $this->cep;
    }

    public function getCity(): string {
        return $this->city;
    }

    public function getState(): string {
        return $this->state;
    }

    public function getPublicPlace(): string {
        return $this->publicPlace;
    }

    public function getNeighborhood(): string {
        return $this->neighborhood;
    }

    public function getNumber(): string {
        return $this->number;
    }

    public function validadeFormat(string $format): bool {
        return preg_match("/^[0-9]{5}\-[0-9]{3}$/", $format);
    }

    public function cleanFormat($format): string {
        return str_replace("-", "", $format);
    }
}

?>