;<?php

class birthDate {
    private String $date;

    public function __construct(String $date) {
        $validFormat = $this->validateFormat($date);
        $validNumbers = $this->validateNumbers($date);

        if ($validFormat === false OR $validNumbers === false) {
            header("Location: index.php?erro=Data De Nascimento");
            die();
        }

        $this->date = $date;
    }

    public function getDate(): String {
        return $this->date;
    }

    private function validateFormat(String $date): bool {
        return preg_match("/^[0-9]{4}\-[0-9]{2}\-[0-9]{2}/", $date);
    }

    private function validateNumbers(String $date): bool {
        $splitDate = explode("-", $date);
        $year = $splitDate[0];
        $month = $splitDate[1];
        $day = $splitDate[2];

        $dateTime = new DateTime($year ."-". $month ."-". $day);
        $dateTimeNow = new DateTime("now", new DateTimeZone("America/Sao_Paulo"));

        if ($dateTimeNow->sub(new DateInterval("P5Y")) < $dateTime) {
            return false;
        } else {
            echo "AAAAAAAAAA";
        }
        return checkdate( $month, $day, $year);

    }
}

?>