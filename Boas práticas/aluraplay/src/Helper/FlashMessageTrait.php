<?php

namespace Alura\Mvc\Helper;

trait FlashMessageTrait {
    
    private function addErroMessage(string $errorMessage): void {
        $_SESSION["error_message"] = $errorMessage;
    }
}

?>