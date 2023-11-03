<?php

class Cnpj {

    private string $cnpj;
    private const WEIGHT_12 = [5,4,3,2,9,8,7,6,5,4,3,2];
    private const WEIGHT_13 = [6,5,4,3,2,9,8,7,6,5,4,3,2];

    public function __construct(string $cnpj) {
        $validFormat = $this->validateCnpj($cnpj);
        $validateTwoDigit = $this->validateTwoDigit($cnpj);
        
        if ($validFormat === false OR $validateTwoDigit === false) {
            header("Location: index.php?erro=CNPJ");
            die();
        }
        $this->cnpj = $this->cleanFormat($cnpj);
    }

    public function getCnpj(): string {
        return $this->cnpj;
    }

    public function validateCnpj(string $cnpj): bool {
        return preg_match("/^[0-9]{2}\.[0-9]{3}\.[0-9]{3}\/[0-9]{4}\-[0-9]{2}$/", $cnpj);
    }

    public function cleanFormat(string $cnpj): string {
        return str_replace([".", "/", "-"], "", $cnpj);
    }

    public function calculateValidDigits(string $cnpj, array $weight): string {
        //Prepara o cnpj e transforma ele em Array para realizar as multiplicações
        $cnpjArray = str_split($cnpj);
        $lenghtCnpj = count($cnpjArray);

        //1º Passo: Realizar a multiplicação dos dígitos do CNPJ e de uma sequência de pesos associados a cada um deles. 
        //O resultado de cada multiplicação é somado:
        for ($i = 0; $i < $lenghtCnpj; $i++) {
            $result[$i] = $cnpjArray[$i] * $weight[$i];
        }

        $sumCnpj = array_sum($result);

        // 2º Passo: O resultado da soma das multiplicações é dividido por 11, com o propósito de obter o resto da divisão:
        $mod = $sumCnpj % 11;

        //3º Passo:  Se o resto da divisão for menor que 2, logo o primeiro dígito verificador é 0; caso contrário, o 
        //primeiro dígito verificador é obtido através da subtração de 11 menos resto da divisão;
        if ($mod < 2) {
            return 0;
        }

        $sub = 11 - $mod;
        return $sub;
    }

    public function validateTwoDigit($cnpj): bool {
        //Preparando o CNPJ com 12 dígitos
        $cleanCnpj = $this->cleanFormat($cnpj);
        $cnpjWith12FirstDigits = substr($cnpj, 0, 12);

        // 1º Passo: Calculando o primeiro dígito verificador
        $firstDigitVerificator = $this->calculateValidDigits($cnpjWith12FirstDigits, self::WEIGHT_12);

        // 2º Passo: Calculando o segundo dígito verificador
        $cnpjWith13FirstDigits = $cnpjWith12FirstDigits . $firstDigitVerificator;
        $secondDigitVerificator = $this->calculateValidDigits($cnpjWith13FirstDigits, self::WEIGHT_13);

        /*3º Passo: Comparar se os 2 dígitos verificadores encontrados são iguais aos dígitos 
        verificadores do CNPJ analisado. Se forem iguais, então o CNPJ é válido.*/
        $cnpjAfterValidate = $cnpjWith12FirstDigits . $firstDigitVerificator . $secondDigitVerificator; 

        if ($cleanCnpj != $cnpjAfterValidate) {
            return false;
        }

        return true;
    }
}

?>