<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Customer;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $customerRecords = [
            ['id'=>1,"name"=>"khan","phone"=>"0783434343"],
            ['id'=>2,"name"=>"Ali","phone"=>"0783434343"],
            ['id'=>3,"name"=>"Ahmad","phone"=>"0783434343"],
        ];
        Customer::insert($customerRecords);
    }
}
