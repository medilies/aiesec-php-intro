<?php

namespace Medilies\AiesecPhpIntro;

class Renderer
{
    public function render(string $view, array $data = []): string
    {
        ob_start();

        extract($data);
        require __DIR__."/views/{$view}.php";

        return ob_get_clean();
    }
}