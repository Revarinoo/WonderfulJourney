<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            'user_id' => 2,
            'category_id' => 1,
            'title'=> 'Pantai Kuta, Bali',
            'description' => 'Pantai Kuta adalah sebuah tempat pariwisata yang terletak kecamatan Kuta, sebelah selatan Kota Denpasar, Bali, Indonesia. Daerah ini merupakan sebuah tujuan wisata turis mancanegara dan telah menjadi objek wisata andalan Pulau Bali sejak awal tahun 1970-an.',
            'image'=>'1612973970kutabali.png'
        ]);
        DB::table('articles')->insert([
            'user_id' => 2,
            'category_id' => 1,
            'title'=> 'Pantai Gili Trawangan, Lombok',
            'description' => 'Gili Trawangan adalah yang terbesar dari ketiga pulau kecil atau gili yang terdapat di sebelah barat laut Lombok. Trawangan juga satu-satunya gili yang ketinggiannya di atas permukaan laut cukup signifikan. Dengan panjang 3 km dan lebar 2 km, Trawangan berpopulasi sekitar 800 jiwa.',
            'image'=>'1612971413gili.jfif'
        ]);
        DB::table('articles')->insert([
            'user_id' => 2,
            'category_id' => 2,
            'title'=> 'Gunung Bromo, Malang',
            'description' => 'Gunung Bromo terkenal sebagai objek wisata utama di Jawa Timur. Sebagai sebuah objek wisata, Bromo menjadi menarik karena statusnya sebagai gunung berapi yang masih aktif. Gunung Bromo termasuk dalam kawasan Taman Nasional Bromo Tengger Semeru.',
            'image'=>'1612974594bromo.jfif'
        ]);
    }
}
