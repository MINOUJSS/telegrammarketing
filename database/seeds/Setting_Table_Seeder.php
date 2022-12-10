<?php

use Illuminate\Database\Seeder;
use App\Settings;

class Setting_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $setting=Settings::create([
            'name'=>'تفعيل ماسح الموقع',
            'value'=>'off',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]); 
        $setting=Settings::create([
            'name'=>'تفعيل المسوق الآلى',
            'value'=>'off',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);       
    }
}
