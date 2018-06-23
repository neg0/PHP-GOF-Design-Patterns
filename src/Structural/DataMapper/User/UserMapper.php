<?php

namespace Structural\DataMapper\User;

class UserMapper
{
    /**
     * @var StorageAdapter
     */
    private $adapter;

    public function __construct(StorageAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    public function findById(int $id): User
    {
        $result = $this->adapter->find($id);

        if (null === $result) {
            throw new \InvalidArgumentException("User ID {$id} not been found");
        }

        return $this->createUser($result);
    }

    private function createUser(array $row)
    {
        return User::createFrom($row);
    }
}
