<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 50)->create()->each(function($u) {
            $u->billingaddress()->save(factory(App\UserBillingaddress::class)->make());
        });
    }
}
