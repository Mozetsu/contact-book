<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;
use DB;

class ContactTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # Remove all existing entrie
        DB::table('contacts')->delete() ;

        Contact::create([
            'name' => 'ice',
            'email' => 'ice@domain.io',
            'phone' => 111111111,
            'country' => "iceland",
        ]);

        Contact::create([
            'name' => 'fire',
            'email' => 'fire@domain.io',
            'phone' => 222222222,
            'country' => "norway",
        ]);

        Contact::create([
            'name' => 'water',
            'email' => 'water@domain.io',
            'phone' => 333333333,
            'country' => "india",
        ]);

        Contact::create([
            'name' => 'water seven',
            'email' => 'water_seven@domain.io',
            'phone' => '333333331',
            'country' => "mexico",
        ]);

        Contact::create([
            'name' => 'earth',
            'email' => 'earth@domain.io',
            'phone' => 444444444,
            'country' => "japan",
        ]);

        Contact::create([
            'name' => 'thunder',
            'email' => 'thunder@domain.io',
            'phone' => 555555555,
            'country' => "sweden",
        ]);

        Contact::create([
            'name' => 'dark',
            'email' => 'dark@domain.io',
            'phone' => 666666666,
            'country' => "italy",
        ]);

        Contact::create([
            'name' => 'dark water',
            'email' => 'dark_water@domain.io',
            'phone' => 666666661,
            'country' => "netherlands",
        ]);
    }
}
