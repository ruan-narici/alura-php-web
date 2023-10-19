<?php

class Phone {
    private String $phone;

    public function __construct(String $phone) {
        $validFormat = $this->validateFormat($phone);

        if ($validFormat === false) {
            header("Location: index.php?erro=Telefone");
            die();
        }

        $this->phone = $this->clearFormat($phone);
    }

    public function getPhone(): String {
        return $this->phone;
    }

    private function validateFormat(string $phone):bool
    {
        return preg_match("/^\([0-9]{2}\) 9?[0-9]{4}\-[0-9]{4}$/", $phone);
    }

    private function clearFormat(string $phone):string
    {
        return str_replace(["(",")","-"," "],"",$phone);
    }
}

?>