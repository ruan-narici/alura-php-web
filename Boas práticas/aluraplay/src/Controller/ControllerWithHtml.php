<?php

namespace Alura\Mvc\Controller;

abstract class ControllerWithHtml {
    
    private const TEMPLATE_PATH = __DIR__ . "/../../views/";

    public function renderTemplate(string $template, array $context = []): void {
        extract($context);
        require_once self::TEMPLATE_PATH . $template . ".php";
    }
}

?>