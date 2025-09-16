<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vehicle;
use App\Models\Contact;

class VehiclesContactsSeeder extends Seeder
{
    public function run()
    {
        Vehicle::factory()->count(20)->create();
        Contact::factory()->count(15)->create();
    }
}
