<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SubCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\Models\Category::factory(10)->create([


            'parent_id' => $this->getRandomParentId(),
        ]);


    }

    private function getRandomParentId(){

        $parent_id =    \App\Models\Category::inRandomOrder()->first();
        return $parent_id;

    }
}
