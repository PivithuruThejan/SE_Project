<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class AdminHomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('/changeadminemailpassword')
            ->see('Change Email & Password Of Admin');
        $this->visit('/removenotusingusers')
            ->see('This is Remove Users.');
        $this->visit('/viewnotusing')
            ->see('This Is To Find Not Using Users.');
    }
}
