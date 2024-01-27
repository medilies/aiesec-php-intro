<?php

namespace Medilies\AiesecPhpIntro;

class Request
{
    public function post(string $key): mixed
    {
        return $this->value($_POST[$key] ?? null);
    }

    public function get(string $key): mixed
    {
        return $this->value($_GET[$key] ?? null);
    }

    private function value(mixed $value): mixed
    {
        if(!is_null($value)) {
            $value = trim($value);
        }

        if($value === '') {
            return null;
        }

        return $value;
    }
}