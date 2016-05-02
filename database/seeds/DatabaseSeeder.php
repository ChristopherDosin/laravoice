<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        DB::table('users_types')->insert([
            'type' => "Kunde"
        ]);

        DB::table('users_types')->insert([
            'type' => "Lieferant"
        ]);

        DB::table('users_types')->insert([
            'type' => "Partner"
        ]);

        DB::table('users_types')->insert([
            'type' => "Interessent"
        ]);

    }
}
