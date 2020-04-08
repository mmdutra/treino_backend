<?php

namespace Feature\Auth;

use App\Models\User;

class AuthControllerTest extends \TestCase
{
    public function testWillReturnToken()
    {
        $result = $this->post('api/auth/login', [
            'email' => 'jewel57@hotmail.com',
            'password' => '12345'
        ]);

        $result->seeStatusCode(200);
    }

    public function testWillMessageUserDoesNotExists()
    {
        $result = $this->post('api/auth/login', [
            'email' => 'teste@teste.com',
            'password' => '12345'
        ]);

        $result->seeStatusCode(404);

        $result->seeJsonEquals([
            'error' => 'Email does not exist.'
        ]);
    }

    public function testWillReturnUnauthorized()
    {
        $result = $this->post('api/auth/login', [
            'email' => 'jewel57@hotmail.com',
            'password' => '123456'
        ]);

        $result->seeJsonEquals([
            'error' => 'Unauthorized'
        ]);

        $result->seeStatusCode(401);
    }

    public function willReturnUnauthorizedWhenPassANotValidToken()
    {
        $result = $this->get('products', [
            'Authorization' => (new User())->setId(10)->getToken()
        ]);

        $result->seeJsonEquals([
            'error' => 'Unauthorized'
        ]);

        $result->seeStatusCode(401);
    }
}
