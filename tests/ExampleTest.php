<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        /**
         * ir a root
         */
        $this->visit('/');

        /**
         * click the button click me
         */
        $this->click('clickMe');

        /**
         * read message
         */
        $this->see("Im feeback");

        /**
         * see the url
         */
        $this->seePageis('/feedback');

    }

}
