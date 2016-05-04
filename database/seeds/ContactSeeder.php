<?php

use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contacts')->insert([
            'salution' => 'Herr',
            'first_name' => 'Christopher',
            'last_name' => 'Dosin',
            'organisation' => 'Media Markt GmbH',
            'position' => 'CEO',
            'contact_type_id' => 1,
            'contacts_billing_address_id' => 1,
            'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('contacts_billing_address')->insert([
            'street' => 'Musterstrasse 1',
            'postalcode' => '42289',
            'city' => 'Wuppertal',
            'contact_id' => 1,
            'country_id' => 1,
            'created_at' => \Carbon\Carbon::now()
        ]);

        DB::table('contact_types')->insert([
            'name' => 'Kunde',
            'shortcut' => 'K',
            'color' => '#000',
            'created_at' => \Carbon\Carbon::now()
        ]);
    }
}
