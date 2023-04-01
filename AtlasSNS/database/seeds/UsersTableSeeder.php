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
            'username' => '田代 潤太郎',
            'mail' => 'juntaro.tashiro@gmail.com',
            'password' => bcrypt('password'),
            //2022.10.19 bcryptはパスワードを暗号化する
            'bio' => '田代 潤太郎です！'
        ]);

        DB::table('users')->insert([
            'username' => '田代 次郎',
            'mail' => 'jiro.tashiro@gmail.com',
            'password' => bcrypt('password'),
            //2022.10.19 bcryptはパスワードを暗号化する
            'bio' => '田代 次郎です！'
        ]);

        DB::table('users')->insert([
            'username' => '斉藤 三郎',
            'mail' => 'saburo.saito@gmail.com',
            'password' => bcrypt('password'),
            //2022.10.19 bcryptはパスワードを暗号化する
            'bio' => '斉藤 三郎です！'
        ]);

        DB::table('users')->insert([
            'username' => '田中 四郎',
            'mail' => 'shiro.tanaka@gmail.com',
            'password' => bcrypt('password'),
            //2022.10.19 bcryptはパスワードを暗号化する
            'bio' => '田中 四郎です！'
        ]);

        DB::table('users')->insert([
            'username' => '中村 五郎',
            'mail' => 'goro.nakamura@gmail.com',
            'password' => bcrypt('password'),
            //2022.10.19 bcryptはパスワードを暗号化する
            'bio' => '中村 五郎です！'
        ]);
    }
}
