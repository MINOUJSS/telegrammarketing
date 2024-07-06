<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\SitesName;

class Site_Name_Table_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Site_Name1=SitesName::create([
            'name' => 'saouradelivery.com',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        $Site_Name2=SitesName::create([
            'name' => 'amazon.com',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        $Site_Name3=SitesName::create([
            'name' => 'youtube.com',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
    }
}
