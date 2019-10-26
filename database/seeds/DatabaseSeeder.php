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

        DB::table('users')->insert([
            'name' => 'Aministrador',
            'email' => 'admin@admin.com',
            'type' => 1,
            'password' => Hash::make('123123'),
        ]);
    }
}
