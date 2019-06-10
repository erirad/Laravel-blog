<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
          'name' => 'admin',
          'password' => bcrypt('admin'),
          'email' => 'admin@example.com',
          'admin' => 1,
          'avatar' => asset('avatars/avatar.png')
        ]);

        App\User::create([
          'name' => 'erika',
          'password' => bcrypt('erika'),
          'email' => 'erika@gmail.com',
          'admin' => 0,
          'avatar' => asset('avatars/avatar.png')
        ]);
    }
}
