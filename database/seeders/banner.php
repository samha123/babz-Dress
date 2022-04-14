<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class banner extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('banners')->insert([
            
            [
                
                "banner"=>"assets\images\banner1.PNG",
            ],
            [
                
                "banner"=>"assets\images\banner2.PNG",
            ],
             [
                
                "banner"=>"assets\images\banner3.PNG",
             ]
            ]);
        }
    
    }

