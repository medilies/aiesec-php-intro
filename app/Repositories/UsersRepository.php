<?php

namespace Medilies\AiesecPhpIntro\Repositories;

class UsersRepository
{
    private array $data;

    public function __construct()
    {
        if(file_exists($this->file())) {
            $this->data = json_decode(file_get_contents($this->file()), true) ?? [];
        } else {
            file_put_contents($this->file(), '[]');
            $this->data = [];
        }

    }

    private function file(): string
    {
        return __DIR__.'/../../database/users.json';
    }

    public function exists(string $username): bool
    {
        return ! is_null($this->find($username));
    }

    public function find(string $username): ?array
    {
        foreach ($this->data as $user) {
            if ($user['username'] === $username) {
                return $user;
            }
        }

        return null;
    }

    public function all(): array
    {
        return $this->data;
    }

    public function create(string $username, string $password): static
    {
        $this->data[] = ['username' => $username, 'password' => $password];

        file_put_contents($this->file(), json_encode($this->data, JSON_PRETTY_PRINT));

        return $this;
    }
}