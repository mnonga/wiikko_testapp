<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CommentControllerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testComment()
    {
        // test connexion avec bons identifiants
        $response = $this->call("POST","api/login",["email"=>"michee@gmail.com", "password"=>"12345678"]);

        $user = json_decode( $response->content(), true);

        $api_token = $user["api_token"];

        $this->assertEquals(200, $response->getStatusCode());
        $this->assertNotEmpty($user["api_token"]);

        var_dump("login response", $response->content());

        // poster un commentaire
        $response = $this->call("POST","api/comments?api_token=$api_token",["content"=>"HelloTest à ".date("d-m-Y")]);


        $this->assertEquals(201, $response->getStatusCode());

        var_dump("post comment response", $response->content());

    }
}
