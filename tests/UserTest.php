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
    public function testUserLoginWithSuperUserAccount()
    {
       $this->visit('/register')
         ->type('SuperUser', 'name')
         ->check('Remember Me')
         ->press('Login')
         ->seePageIs('/dashboard');
       
        
    }
}
