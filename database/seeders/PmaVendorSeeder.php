<?php

namespace Database\Seeders;

use App\Models\Pma_vendor;  
use Illuminate\Database\Seeder;
use Faker\Factory as Faker; 

class PmaVendorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();  

        for ($i=1; $i <= 10 ; $i++) { 
            $data = [
                'vendor_name' => $faker->firstName
            ];
            pma_vendor::create($data);
        }
            
        }
    }
