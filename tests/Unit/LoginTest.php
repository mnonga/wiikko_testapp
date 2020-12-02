<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class LoginTest extends TestCase
{
    /**
     * Tester le login
     *
     * @return void
     */
    public function testLogin()
    {

        // test connexion avec bons identifiants
        $response = $this->call("POST","api/login",["email"=>"michee@gmail.com", "password"=>"12345678"]);

        $user = json_decode( $response->content(), true);

        $this->assertEquals(200, $response->getStatusCode(), "Status code de la connexion == 200");
        $this->assertNotEmpty($user["api_token"]);

        $api_token = $user["api_token"];

        var_dump("login response", $response->content());

        // test du profile
        $response = $this->call("GET","api/user?api_token=$api_token");
        $this->assertJson($response->content(), "La reponse du profile est un json");
        $user = json_decode( $response->content(), true);
        $this->assertNotEmpty($user["id"]);

        var_dump("profile response", $response->content());

        // test connexion avec mauvais identifiants

        $response = $this->call("POST","api/login",["email"=>"michee@gmail.com", "password"=>"bad_password"]);
        $this->assertEquals(401, $response->getStatusCode());

        var_dump("bad login response", $response->content());

    }
}
