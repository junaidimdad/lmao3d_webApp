<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        /**This Seeder Class is Related to the Multi Role Management Functionality of LMAO 3D
         * Which will be enabled when required.
         */
        //$this->call(RolesTableSeeder::class);
        // $this->call(UserSeeder::class);
    }
}
