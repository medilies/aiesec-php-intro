<?php

namespace Medilies\AiesecPhpIntro\Controllers;

use Medilies\AiesecPhpIntro\Renderer;

class LandingController
{
    private Renderer $renderer;

    public function __construct()
    {
        $this->renderer = new Renderer;    
    }

    public function handle(): string
    {
        return $this->renderer->render('landing');
    }
}