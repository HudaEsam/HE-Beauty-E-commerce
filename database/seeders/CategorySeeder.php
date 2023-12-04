<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "name"=>"Women's Cotton Hoodies",
            "desc"=>"Fabric: 100% cotton/Machine wash, hang dry
            Front kangroo pockets, hooded style .
            Cute candy-colored hoodie,many ways to tie the rope.
            Great for casual, school, daily wear, exercise, home etc,suitable for autumn winter nspring."
        ]);
    }
}
