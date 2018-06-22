<?php

namespace Tests\Structural;

use PHPUnit\Framework\TestCase;
use Structural\DataMapper\StorageAdapter;
use Structural\DataMapper\User;
use Structural\DataMapper\UserMapper;

class DataMapperTest extends TestCase
{
    private const USER_ID = 1;
    private const MOCK_DATA = [
        self::USER_ID => [
            User::FIELD_USERNAME => 'johny92',
            User::FIELD_EMAIL => 'johnd.92@mail.com',
        ]
    ];

    /**
     * @var UserMapper
     */
    private $sut;

    /**
     * @var StorageAdapter
     */
    private $adapter;

    public function testUserDataMapper()
    {
        $this->adapter = new StorageAdapter(self::MOCK_DATA);
        $this->sut = new UserMapper($this->adapter);

        $user = $this->sut->findById(self::USER_ID);

        $this->assertInstanceOf(User::class, $user);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testUserDataMapperInvalidId()
    {
        $this->adapter = new StorageAdapter([]);
        $this->sut = new UserMapper($this->adapter);

        $user = $this->sut->findById(self::USER_ID);

        $this->assertInstanceOf(User::class, $user);
    }
}
