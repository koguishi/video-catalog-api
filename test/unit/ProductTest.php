<?php

namespace test\unit;

use core\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function test_call_foo()
    {
        $product = new Product();
        $response = $product->foo();
        $this->assertEquals('O produto custa 123', $response);
    }
}