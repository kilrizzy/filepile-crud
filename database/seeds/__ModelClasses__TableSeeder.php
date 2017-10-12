<?php

use Illuminate\Database\Seeder;

class __ModelClasses__TableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $requiredModels = 15;
        $currentModelsCount = \App\__ModelClass__::all()->count();
        if($currentModelsCount < $requiredModels){
            for($i=0;$i<$requiredModels;$i++){
                $model = factory(\App\__ModelClass__::class)->create();
            }
        }
    }
}
