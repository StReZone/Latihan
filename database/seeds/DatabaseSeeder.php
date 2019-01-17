<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Role come before user seeder here
         $this->call(RoleTableSeeder::class);
        // User Seeder will use the roles above create
        $this->call(UserTableSeeder::class);
    }
}
