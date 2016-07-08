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

    public function testThatSearchFormWasSubmittedEmpty()
    {
        $this->visit('/search')
        ->type('', 'search')
        ->press('Search')
        ->see('The search field is required.');
    }

    public function testSearchFunction()
    {
        $category = factory('Inventory\Category')->create();
        $product =  factory('Inventory\Product')->create();

        $this->visit('/search')
        ->type($product->name, 'search')
        ->press('Search')
        ->seePageIs('/search-form')
        ->see($product->name)
        ->see($product->price)
        ->see($product->category->name);
    }
}
