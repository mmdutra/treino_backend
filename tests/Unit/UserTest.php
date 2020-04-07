<?php

namespace Unit;

use App\Models\User;

class UserTest extends \TestCase
{
    public function testWillReturnTheToken()
    {
        $token = (new User())->setId(1)->getToken();

        $this->assertIsString($token);

        $this->assertTrue(strlen($token) > 30);
    }
}
