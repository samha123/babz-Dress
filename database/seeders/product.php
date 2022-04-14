<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class product extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        
        DB::table('products')->insert([
            
        [
            'name'=>'Panasonic Tv',
            "price"=>"400",
            "description"=>"A smart tv with much more feature",
            "category"=>"tv",
            "gallery"=>"assets\images\tvq.PNG",
        ],
        [
            'name'=>'Fridge',
            "price"=>"500",
            "description"=>"A tv with much more feature",
            "category"=>"fridge",
            "gallery"=>"assets\images\fridgeq.PNG",
        ],
         [
            'name'=>'Camera',
            "price"=>"200",
            "description"=>"A camera with much more feature",
            "category"=>"camera",
            "gallery"=>"assets\images\camera.PNG",
         ]
        ]);
    }
}