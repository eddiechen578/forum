<?php

use Illuminate\Database\Seeder;
use App\Entities\Channel;
class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'laravel 5.5',
            'slug' => str_slug('laravel 5.5')
        ]);

       Channel::create([
            'name' => 'vue.js',
            'slug' => str_slug('vue.js')
        ]);

       Channel::create([
            'name' => 'php7',
            'slug' => str_slug('php7')
        ]);
    }
}
