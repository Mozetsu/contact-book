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
            'country' => "Mexico",
        ]);

        Contact::create([
            'name' => 'earth',
            'email' => 'earth@domain.io',
            'phone' => 444444444,
            'country' => "Japan",
        ]);

        Contact::create([
            'name' => 'thunder',
            'email' => 'thunder@domain.io',
            'phone' => 555555555,
            'country' => "Sweden",
        ]);
    }
}
