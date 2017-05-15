<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class RegisterTest extends TestCase
{
   use DatabaseMigrations;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()/* test wether route is correct for user login and when loging out comes back to the welcome page*/
    {

        $this->visit('/logout')
            ->see('System Provides You!!');
        $this->visit('/adminhome')
            ->see('Remove Users');
    }
}
