<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

    // Reverts all the changes to the DB automatically after the test finishes
    use DatabaseTransactions;

    /** @test */
    public function my_first_test()
    {
    }
}
