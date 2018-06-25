<?php

namespace Structural\DependencyInjection\UserBirthday;

class BirthdayCardService
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function createUserBirthDayMessage(User $user)
    {
        if ($this->checkUserBirthDay($user)) {
            return sprintf('Dear %s. Happy Birthday.', $user->getFirstName());
        }
    }

    private function checkUserBirthDay(User $user): bool
    {
        return $user->getBirthDay()->format('Ymd') ===
            (new \DateTime('now'))->format('Ymd');
    }
}
