<?php

namespace Medilies\AiesecPhpIntro\Controllers;

use Medilies\AiesecPhpIntro\Renderer;
use Medilies\AiesecPhpIntro\Repositories\UsersRepository;

class HomeController
{
    private UsersRepository $users;
    private Renderer $renderer;

    public function __construct()
    {
        $this->users = new UsersRepository;
        $this->renderer = new Renderer;
    }

    public function handle(): string
    {
        return $this->renderer->render('home', ['users' => $this->users->all()]);
    }
}