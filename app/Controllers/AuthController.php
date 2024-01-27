<?php

namespace Medilies\AiesecPhpIntro\Controllers;

use Medilies\AiesecPhpIntro\Renderer;
use Medilies\AiesecPhpIntro\Repositories\UsersRepository;
use Medilies\AiesecPhpIntro\Request;
use Medilies\AiesecPhpIntro\Session;

class AuthController
{
    private Request $request;
    private Session $session;
    private UsersRepository $users;
    private Renderer $renderer;

    public function __construct()
    {
        $this->request = new Request;
        $this->session = new Session;
        $this->users = new UsersRepository;
        $this->renderer = new Renderer;
    }

    public function registerPage(): string
    {
        return $this->renderer->render('register');
    }

    public function loginPage(): string
    {
        return $this->renderer->render('login');
    }

    public function register(): string
    {
        $username = $this->request->post('username');
        $password = $this->request->post('password');

        if(is_null($username) || is_null($password)) {
            redirect('/register');
            return '';
        }

        if($this->users->exists($username)) {
            redirect('/register');
            return '';
        }

        $password = password_hash($password, PASSWORD_DEFAULT);

        $this->users->create($username, $password);

        $this->session->put('username', $username);
        
        redirect('home');
        return '';
    }

    public function login(): string
    {
        $username = $this->request->post('username');
        $password = $this->request->post('password');

        if (is_null($username) || is_null($password)) {
            redirect('login');
            return '';
        }

        if (! $this->users->exists($username)) {
            redirect('login');
            return '';
        }

        $user = $this->users->find($username);

        if (! password_verify($password, $user['password'])) {
            redirect('login');
            return '';
        }

        $this->session->put('username', $username);

        redirect('home');
        return '';
    }

    public function logout(): string
    {
        session_unset();

        session_destroy();

        redirect('');
        return '';
    }
}