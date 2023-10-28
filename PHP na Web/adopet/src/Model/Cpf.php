<?php

class Cpf {
    private string $cpf;
    private const WEIGHT_10 = 10;
    private const WEIGHT_11 = 11;

    public function __construct(string $cpf) {
        $validFormat = $this->validateCpf($cpf);
        $validateTwoDigit = $this->validateTwoDigit($cpf); 
        if ($validFormat === false OR $validateTwoDigit === false) {
            header("Location: index.php?erro=CPF");
            die();
        }

        $this->cpf = $this->cleanFormat($cpf);
    }

    public function getCpf(): string {
        return $this->cpf;
    }

    public function validateCpf(string $cpf): bool {
        return preg_match("/^[0-9]{3}\.[0-9]{3}\.[0-9]{3}\-[0-9]{2}$/", $cpf);
    }

    public function cleanFormat(string $format): string {
        return str_replace([".", "-"],"", $format);
    }

    public function validateTwoDigit(string $cpf): bool {
        //Preparando o CPF com 9 dígitos
        $cpfClean = $this->cleanFormat($cpf);
        $nineDigits = substr($cpfClean,0,9);

        // 1º Passo:Calculando o primeiro dígito verificador
        $firstDigit = $this->calculateValidDigits($nineDigits, self::WEIGHT_10);

        // 2º Passo: Calculando o segundo dígito verificador

        $tenDigits  = $nineDigits . $firstDigit;
        $secondDigit = $this->calculateValidDigits($tenDigits, self::WEIGHT_11);

        //3º Passo: Comprar se os 2 dígitos verificadores encontrados são iguais
        //aos dígitos verificadores do CPF analisado. Se forem iguais, então o CPF é válido.

        $cpfAfterValidation = $nineDigits . $firstDigit . $secondDigit;

        if ($cpfClean != $cpfAfterValidation) {
            return false;
        }

        return true;
    }

    public function calculateValidDigits(string $cpf, int $weight): int {        
        //Prepara o cpf e transforma ele em Array para realizar as multiplicações
        $cpfArray = str_split($cpf);
        $cpfSize = count($cpfArray);
        
        //1º Passo: Realizar a multiplicação dos dígitos do CPF e de uma sequência de pesos associados a cada um deles. 
        //O resultado de cada multiplicação é somado:
        for ($i = 0; $i < $cpfSize; $i++) {
            $result[$i] = $cpfArray[$i] * $weight;
            $weight--;
        }
        $sum = array_sum($result);

        // 2º Passo: O resultado da soma das multiplicações é dividido por 11, com o propósito de obter o resto da divisão:
        $mod = $sum %11;

        //3º Passo:  Se o resto da divisão for menor que 2, logo o primeiro dígito verificador é 0; 
        //caso contrário, o primeiro dígito verificador é obtido através da subtração de 11 menos o resto da divisão;
        if ($mod < 2) {
            return 0;
        }

        $sub = 11 - $mod;
        return $sub;
    }
}

?>