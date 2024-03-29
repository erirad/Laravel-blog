<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $t1 = 'Scrambled it to make a type specimen book. It has survived not only five';
       $t2 = 'Essentially unchanged. It was popularised in the 2019 with the release of';
       $t3 = 'Letraset sheets containing Lorem Ipsum passages, and more recently with';
       $t4 = 'Sydney College in Virginia, looked up one of the more obscure Latin words';

       $d1 = [
         'title' => $t1,
         'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
         'channel_id' => 1,
         'user_id' => 2,
         'slug' => str_slug($t1)
       ];
       $d2 = [
         'title' => $t2,
         'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
         'channel_id' => 2,
         'user_id' => 2,
         'slug' => str_slug($t2)
       ];
       $d3 = [
         'title' => $t3,
         'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
         'channel_id' => 3,
         'user_id' => 1,
         'slug' => str_slug($t3)
       ];
       $d4 = [
         'title' => $t4,
         'content' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
         'channel_id' => 4,
         'user_id' => 2,
         'slug' => str_slug($t4)
       ];

       Discussion::create($d1);
       Discussion::create($d2);
       Discussion::create($d3);
       Discussion::create($d4);
    }
}
