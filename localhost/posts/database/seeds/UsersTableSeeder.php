<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nbUsers = (int)($this->command->ask("How many Users you want to make..?", 30));
        factory(App\User::class, $nbUsers)->create();
    }
}
