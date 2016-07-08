<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SearchProducTest extends TestCase
{
    public function testViewSearchForm()
    {
        $this->visit('/')
        ->click('Search')
        ->seePageIs('/search');

    }
}
