<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Support\Facades\Route;


class TestAllRoutesTest extends TestCase
{

    /**
     * Test all routes are not 500 Laravel ^8 
     */

    public function testAllRoutesFound(){

        $routeCollection =Route::getRoutes();
        foreach ($routeCollection as $value) {
            $getmethod = $value->methods()[0];
            $response = $this->$getmethod($value->uri());
            $this->assertNotEquals(500, $response->status(),"{$value->methods()[0]} {$value->uri()}");
        }
    }
}
