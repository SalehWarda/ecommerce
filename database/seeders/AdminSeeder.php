<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Admin::create([

            'name'     =>  'Saleh AbuWarda',
            'email'    =>  'salehwarda66@gmail.com',
            'password' =>   bcrypt("sa403737570sa"),
            'photo'     =>  'photo',



        ]);
    }
}
