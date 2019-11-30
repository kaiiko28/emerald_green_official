<?php

use Illuminate\Database\Seeder;

class TopAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $activation_code = 'EG-' . str_random(4) . '-' . date("G")  . str_random(2);
        DB::table('users')->insert([
            'username' => 'master_user',
            'firstname' => 'ANNALIZA BADE',
            'lastname' => 'DELA CRUZ',
            'email' => 'emerald_master@gmail.com',
            'password' => Hash::make('masteradmin123123@'),
            'referrer' => 'master_account',
            'code' => $activation_code,
        ]);

        DB::table('user_captchas')->insert([
            'Solved' => 0,
            'Earnings' => 0,
            'user_id' => 1,
            'username' => 'master_user',
            'user_email' => 'emerald_master@gmail.com',
            'captcha_count' => 10000,
        ]);

        DB::table('wallets')->insert([

            'username' => 'master_user',
            'email' => 'emerald_master@gmail.com',
            'name' => 'ANNALIZA BADE DELA CRUZ',
            'user_id' => 1,
            'deposit' => 0,
            'withdrawal' => 0,
        ]);

        DB::table('tableofexit')->insert([
            'userid' => 1,
            'username' => 'master_user',
            'email' => 'emerald_master@gmail.com',
            'user_code' => $activation_code,
            'current_table_earning' => 0,
        ]);

        DB::table('referals')->insert([
            'name' => 'ANNALIZA BADE DELA CRUZ',
            'Referer_code' => 'master_Account',
            'MyRef_code' => $activation_code,
            'reward' => 40,
            'indirect' => 10,
        ]);
    }
}
