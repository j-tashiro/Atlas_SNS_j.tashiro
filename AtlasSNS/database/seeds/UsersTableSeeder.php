<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //以下を追加します。
        DB::table('users')->insert([
            'username' => '田代潤太郎',
            'mail' => 'juntaro.tashiro@gmail.com',
            'password' => bcrypt('password'),
            //2022.10.19 bcryptはパスワードを暗号化する
            'bio' => '田代潤太郎です！'
        ]);
    }
}
