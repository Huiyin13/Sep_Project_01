<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
// Added new seeder
use Illuminate\Support\Facades\DB;
// To encrypt the password 
use Illuminate\Support\Facades\Hash;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('staffs')->insert([
            [
                'Staff_Name'=>'Staff 1',
                'Staff_Password'=>Hash::make('ABCD1234')
            ],   
        ]);
    }
}
