<?php

abstract class AbstractController
{
    public function render(string $template, array $data): void
    {
        $categoryManager = new CategoryManager();
        $categories = $categoryManager->findAll();
        require 'templates/layout.phtml';
    }

    public function redirect($route): void
    {
        header("Location: $route");
    }
}
