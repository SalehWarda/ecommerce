<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingDataBaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Setting::setMany([

            'default_locale'       =>  'ar',
            'default_timezone'     =>  'Africa/Cairo',
            'reviews_enable'       =>   true,
            'auto_approve_reviews' =>   true,
            'supported_currencies' =>  ['USD','LE','SAR'],
            'default_currency'     =>  'USD',
            'store_email'          =>  'salehwarda6@gmail.com',
            'search_engine'        =>  'mysql',
            'local_shipping_cost'  =>   0,
            'outer_shipping_cost'  =>   0,
            'free_shipping_cost'   =>   0,
            'translatable'         =>[

                'store_name'             => 'Emamy Store',
                'free_shipping_lable'    => 'Free Shipping',
                'local_lable'            => 'Local Shipping',
                'outer_lable'            => 'Outer Shipping',
            ]
        ]);
    }
}
