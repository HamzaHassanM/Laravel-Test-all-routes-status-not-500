# Laravel-Test-all-routes-status-not-500

## This method check if all routes file for progect is runnig well and not has (STATUS) 500.

# Code 


    public function testAllRoutesFound(){
        // Get All Routes : 
        $routeCollection =Route::getRoutes();

        // Loop inside routes to get route name and method 
        foreach ($routeCollection as $value) {
            $getmethod = $value->methods()[0];
            $response = $this->$getmethod($value->uri());

            // check if not 500
            $this->assertNotEquals(500, $response->status(),"{$value->methods()[0]} {$value->uri()}");
        }
    } 

    
## Usage : 
- create test file with `php artisan make:test {Filename}`
- use the current method to check all routes are not 500


# Thanks :) 
