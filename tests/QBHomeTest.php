<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class QBHomeTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->visit('/changeqbemailpassword')
        ->see('Change Email & Password Of Question Bank');
        $this->visit('/createsubject')
            ->see('This is Create A Subject.');
        $this->visit('/modifysubject')
            ->see('This is Modify A Subject.');
        $this->visit('/modifysubject')
            ->see('This is Modify A Subject.');
        $this->visit('/insertessayquestion')
            ->see('This is Insert An Essay Question.');
        $this->visit('/searchmodifyessayquestion')
            ->see('This is Search & Modify Essay Question.');
        $this->visit('/insertmcqquestion')
            ->see('This is Insert A MCQ Question.');
        $this->visit('/searchmodifymcqquestion')
            ->see('This is Search & Modify MCQ Question.');
        $this->visit('/deletequestion')
            ->see('This is Delete A Question.');
        $this->visit('/deletesubject')
            ->see('This is Delete A Subject.');
    }
}
