<?php

namespace Hyqo\UUID\Test;

use PHPUnit\Framework\TestCase;

use function Hyqo\UUID\uid;
use function Hyqo\UUID\uuid4;

class UuidTest extends TestCase
{
    public function test_length(): void
    {
        for ($i = 1; $i <= 1000; $i++) {
            $length = random_int(4, 128);

            $uid = uid($length);

            $this->assertEquals($length, strlen($uid));
        }
    }

    public function test_unique(): void
    {
        $generated = [];

        for ($i = 1; $i <= 1e5; $i++) {
            $uid = uid();

            $this->assertFalse(isset($generated[$uid]));

            $generated[$uid] = 1;
        }
    }

    public function test_min_length(): void
    {
        $this->assertEquals(4, strlen(uid(0)));
    }

    public function test_max_length(): void
    {
        $this->assertEquals(128, strlen(uid(9999)));
    }

    public function test_uuid4(): void
    {
        $uuid = uuid4();
        $matched = preg_match('/^[\w]{8}-[\w]{4}-4[\w]{3}-[\w]{4}-[\w]{12}$/', $uuid);

        $this->assertEquals(1, $matched, $uuid);
    }

    public function test_uuid_unique(): void
    {
        $generated = [];

        for ($i = 1; $i <= 1e5; $i++) {
            $uuid = uuid4();

            $this->assertFalse(isset($generated[$uuid]));

            $generated[$uuid] = 1;
        }
    }
}
