<?php

namespace Medilies\AiesecPhpIntro;

class Session
{
    public function get(string $key): mixed
    {
        return $_SESSION[$key] ?? null;
    }
    
    public function put(string $key, mixed $value): mixed
    {
        $_SESSION[$key] = $value;

        return $value;
    }
}