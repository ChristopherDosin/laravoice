<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Faker\Factory as Faker;

/**
 * Class ExampleTest
 */
class ExampleTest extends TestCase
{

    /**
     * A basic functional test example.
     *
     * @return void
     */
    public function testBasicExample()
    {
        $faker = Faker::create();

        $this->visit('client/create')
            ->type($faker->firstName , 'first_name')
            ->type($faker->lastName, 'last_name')
            ->type($faker->email, 'email')
            ->type($faker->streetAddress, 'street')
            ->type($faker->postcode, 'postalcode')
            ->type($faker->city, 'city')
            ->select('AL', 'country')
            ->press('save')
        ;
    }
}
