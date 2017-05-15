<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserHomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('/questionbankregister')
            ->see('Register');
        $this->visit('/questionbanklogin')
            ->see('Login');
        $this->visit('/changeemailpassword')
            ->see('Change Email & Password');
        $this->visit('/paperset')
            ->see('This is User Paper set.');
        $this->visit('/papermodify')
            ->see('This is User Paper Modify.');
        $this->visit('/paperdelete')
            ->see('This is User Paper Delete.');
    }
}
