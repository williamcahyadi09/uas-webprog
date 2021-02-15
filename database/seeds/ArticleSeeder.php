<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('articles')->insert([
            [
                'user_id' => 2,
                'category_id' => 1,
                'title' => "Pantai Test",
                'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas porttitor tortor sem, nec convallis ante dictum vitae. Pellentesque dolor lacus, aliquet auctor libero id, fringilla egestas ex. Maecenas vitae tincidunt erat. Mauris risus tellus, malesuada ac accumsan at, egestas vitae nisl.",
                'image' => "image1.jpg",
            ],
        ]);
    }
}
