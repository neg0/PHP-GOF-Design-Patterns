<?php

namespace Tests\Structural;

use PHPUnit\Framework\TestCase;
use Structural\DataMapper\User\StorageAdapter;
use Structural\DataMapper\User\User;
use Structural\DataMapper\User\UserMapper;

class DataMapperTest extends TestCase
{
    private const USER_ID = 1;
    private const MOCK_DATA = [
        self::USER_ID => [
            User::FIELD_USERNAME => 'johny92',
            User::FIELD_EMAIL => 'johnd.92@mail.com',
        ]
    ];

    public function testUserDataMapper(): void
    {
        $storageAdapter = $this
            ->getMockBuilder(StorageAdapter::class)
            ->enableOriginalConstructor()
            ->setConstructorArgs(self::MOCK_DATA)
            ->getMock();

        $storageAdapter
            ->expects($this->once())
            ->method('find')
            ->willReturn(self::MOCK_DATA[self::USER_ID]);

        $sut = new UserMapper($storageAdapter);

        $user = $sut->findById(self::USER_ID);

        $this->assertInstanceOf(User::class, $user);
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testUserDataMapperInvalidId(): void
    {
        $storageAdapter = new StorageAdapter([]);
        $sut = new UserMapper($storageAdapter);

        $user = $sut->findById(self::USER_ID);

        $this->assertInstanceOf(User::class, $user);
    }
}
