<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductForm extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function testThatUserIsRedirectedToAddProductPage()
    {
        $this->visit('/')
        ->click('Add Product')
        ->seePageIs('/add-product');

    }

    public function testThatProductFormWasFilledAndSubmitted()
    {
        $this->visit('/add-product')
        ->type('Product Name', 'name')
        ->type('Product Category', 'category')
        ->type('Product Price', 'price')
        ->press('Add')
        ->see('Product Added Successfully');
    }
}
