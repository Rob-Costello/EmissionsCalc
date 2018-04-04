<?php

use Laravel\Lumen\Testing\DatabaseMigrations;
use Laravel\Lumen\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    

    /*public function testRegiserUserReturnSuccess()
    {

        $this->post('/register',['email' => 'testyMcTestFace@test.com1',
                                'codas_account'=>'1234556',
                                'business' =>'test business', 
                                'password' => 'HelloW0rld!'])
        ->seeJson(['status'=>'success']);
        
    }*/

    public function testRegiserUserReturnFailedInvalidPassword()
    {

        $this->post('/register',['email' => 'testyMcTestFace@test.com1',
                                'codas_account'=>'1234556',
                                'business' =>'test business', 
                                'password' => 'HelloWrld!'])
        ->seeJson(['status'=>'failed']);
    }

    public function testLoginUserReturnSuccessful(){

        $this->post('/login',['email' => 'testyMcTestFace@test.com', 
                            'password' => 'HelloW0rld!'])
        ->seeJson(['status'=>'success']);

    }

     public function testLoginUserReturnFailedInvalidPassword(){

        $this->post('/login',['email' => 'testyMcTestFace@test.com', 
                            'password' => 'HelloW0ld!'])
        ->seeJson(['status'=>'failed']);

    }

     public function testLoginUserReturnFailedInvalidEmail(){

        $this->post('/login',['email' => 'tesyMcTestFace@test.com', 
                            'password' => 'HelloW0ld!'])
        ->seeJson(['status'=>'failed']);

    }

}
