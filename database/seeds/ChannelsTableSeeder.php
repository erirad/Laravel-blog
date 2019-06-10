<?php
use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $channel1 = ['title' => 'Laravel 5', 'slug' => str_slug('Laravel 5')];
      $channel2 = ['title' => 'Vuejs', 'slug' => str_slug('Vuejs')];
      $channel3 = ['title' => 'CSS3', 'slug' => str_slug('CSS3')];
      $channel4 = ['title' => 'Javascript', 'slug' => str_slug('Javascript')];
      $channel5 = ['title' => 'PHP testing', 'slug' => str_slug('PHP testing')];
      $channel6 = ['title' => 'HTML5', 'slug' => str_slug('HTML5')];

      Channel::create($channel1);
      Channel::create($channel2);
      Channel::create($channel3);
      Channel::create($channel4);
      Channel::create($channel5);
      Channel::create($channel6);
    }
}
