<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Categorys;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category1=Categorys::create([
            'name'=>'بدون  تصنيف',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        $category1=Categorys::create([
            'name'=>'رياضة',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        $category1=Categorys::create([
            'name'=>'ساعات نسائية',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        $category1=Categorys::create([
            'name'=>'ساعات أطفال',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        $category1=Categorys::create([
            'name'=>'مستلزمات المنزل',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        $category1=Categorys::create([
            'name'=>'ألعاب',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        $category1=Categorys::create([
            'name'=>'أطفال',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
        $category1=Categorys::create([
            'name'=>'هدايا',
            'created_at'=>date('Y-m-d h:i:s'),
            'updated_at'=>date('Y-m-d h:i:s')
        ]);
    }
}
