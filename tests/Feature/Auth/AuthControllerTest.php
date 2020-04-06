<?php

namespace Feature\Auth;

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
    }

    public function testWillReturnUnauthorized()
    {
        $result = $this->post('api/auth/login', [
            'email' => 'jewel57@hotmail.com',
            'password' => '123456'
        ]);

        $result->seeJsonEquals([
            'message' => 'Unauthorized'
        ]);

        $result->seeStatusCode(401);
    }
}
