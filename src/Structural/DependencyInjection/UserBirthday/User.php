<?php

namespace Structural\DependencyInjection\UserBirthday;

class User
{
    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    private $lastName;

    /**
     * @var \DateTime
     */
    private $birthDay;

    /**
     * @var string
     */
    private $placeOfBirth;

    public function __construct(
        string $firstName,
        string $lastName,
        \DateTime $birthDay,
        string $placeOfBirth
    ) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->birthDay = $birthDay;
        $this->placeOfBirth = $placeOfBirth;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    public function getBirthDay(): \DateTime
    {
        return $this->birthDay;
    }

    public function setBirthDay(\DateTime $birthDay): void
    {
        $this->birthDay = $birthDay;
    }

    public function getPlaceOfBirth(): string
    {
        return $this->placeOfBirth;
    }

    public function setPlaceOfBirth(string $placeOfBirth): void
    {
        $this->placeOfBirth = $placeOfBirth;
    }
}
