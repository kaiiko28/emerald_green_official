<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Emerald Green Admin',
            'username' => 'emarald_master',
            'email' => 'emerald_master@gmail.com',
            'job_title' => 'Master',
            'password' => Hash::make('masteradmin123123@')
        ]);
    }
}
