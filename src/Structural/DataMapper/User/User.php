<?php

namespace Structural\DataMapper\User;

class User
{
    public const FIELD_USERNAME = 'username';
    public const FIELD_EMAIL = 'email';

    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $email;

    private function __construct(string $username, string $email)
    {
        $this->username = $username;
        $this->email = $email;
    }

    public static function createFrom(array $data)
    {
        return new self(
            $data[self::FIELD_USERNAME],
            $data[self::FIELD_EMAIL]
        );
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    protected function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    protected function setEmail(string $email): void
    {
        $this->email = $email;
    }
}
