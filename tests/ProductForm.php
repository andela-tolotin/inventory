<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductForm extends TestCase
{
    public function testThatUserIsRedirectedToAddProductPage()
    {
        $this->visit('/')
        ->click('Add Product')
        ->seePageIs('/add-product');

    }

    public function testThatProductFormWasFilledAndSubmitted()
    {
        $category = factory('Inventory\Category')->create();
        $product =  factory('Inventory\Product')->create();

        $this->visit('/add-product')
        ->type('Sugar Cane', 'name')
        ->select($category->id, 'category')
        ->type(2000, 'price')
        ->press('Add')
        ->see('Product Added Successfully');
    }

    public function testThatProductFieldsAreEmpty()
    {
        $category = factory('Inventory\Category')->create();
        $product =  factory('Inventory\Product')->create();

        $this->visit('/add-product')
        ->type('', 'name')
        ->select($category->id, 'category')
        ->type(2000, 'price')
        ->press('Add')
        ->see('The name field is required.');
    }
}
