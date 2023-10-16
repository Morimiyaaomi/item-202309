<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\User::create([
            'name' => '管理者1',
            'email' => 'admin01@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('administrator1'), // パスワードをハッシュ化する関数
            'role' =>'1',
            'created_at' => now(),//php artisan db:seed --class=CategorySeeder（<--今回のseeder名）をひたすら繰り返す
            'updated_at' => now(),//現在の時刻を入れるメソッド
            //なお、対応するmigrationファイルにtimestamps()のカラムがないとエラーになる
            //idのカラムは要らない
        ]);

        \App\Models\User::create([
            'name' => '管理者2',
            'email' => 'admin02@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('administrator2'), // パスワードをハッシュ化する関数
            'role' =>'2',
            'created_at' => now(),//php artisan db:seed --class=CategorySeeder（<--今回のseeder名）をひたすら繰り返す
            'updated_at' => now(),//現在の時刻を入れるメソッド
            //なお、対応するmigrationファイルにtimestamps()のカラムがないとエラーになる
            //idのカラムは要らない
        ]);


        \App\Models\User::create([
            'name' => '管理者3',
            'email' => 'admin03@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('administrator3'), // パスワードをハッシュ化する関数
            'role' =>'3',
            'created_at' => now(),//php artisan db:seed --class=CategorySeeder（<--今回のseeder名）をひたすら繰り返す
            'updated_at' => now(),//現在の時刻を入れるメソッド
            //なお、対応するmigrationファイルにtimestamps()のカラムがないとエラーになる
            //idのカラムは要らない
        ]);

        \App\Models\User::create([
            'name' => '管理者4',
            'email' => 'admin04@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('administrator4'), // パスワードをハッシュ化する関数
            'role' =>'4',
            'created_at' => now(),//php artisan db:seed --class=CategorySeeder（<--今回のseeder名）をひたすら繰り返す
            'updated_at' => now(),//現在の時刻を入れるメソッド
            //なお、対応するmigrationファイルにtimestamps()のカラムがないとエラーになる
            //idのカラムは要らない
        ]);

        \App\Models\User::create([
            'name' => '管理者5',
            'email' => 'admin05@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('administrator5'), // パスワードをハッシュ化する関数
            'role' =>'5',
            'created_at' => now(),//php artisan db:seed --class=CategorySeeder（<--今回のseeder名）をひたすら繰り返す
            'updated_at' => now(),//現在の時刻を入れるメソッド
            //なお、対応するmigrationファイルにtimestamps()のカラムがないとエラーになる
            //idのカラムは要らない
        ]);


        \App\Models\User::create([
            'name' => '夏目漱石',
            'email' => 'wagahai@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('IAmACat_IDoNotHaveMyName'), // パスワードをハッシュ化する関数
            'role' =>'0',
            'created_at' => now(),//php artisan db:seed --class=CategorySeeder（<--今回のseeder名）をひたすら繰り返す
            'updated_at' => now(),//現在の時刻を入れるメソッド
            //なお、対応するmigrationファイルにtimestamps()のカラムがないとエラーになる
            //idのカラムは要らない
        ]);

        \App\Models\User::create([
            'name' => '樋口一葉',
            'email' => 'higuchi_oneleaf@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('takekurabe'), // パスワードをハッシュ化する関数
            'role' =>'0',
            'created_at' => now(),//php artisan db:seed --class=CategorySeeder（<--今回のseeder名）をひたすら繰り返す
            'updated_at' => now(),//現在の時刻を入れるメソッド
            //なお、対応するmigrationファイルにtimestamps()のカラムがないとエラーになる
            //idのカラムは要らない
        ]);


        \App\Models\User::create([
            'name' => '福沢諭吉',
            'email' => 'yukichi@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('gakumonnosusume'), // パスワードをハッシュ化する関数
            'role' =>'0',
            'created_at' => now(),//php artisan db:seed --class=CategorySeeder（<--今回のseeder名）をひたすら繰り返す
            'updated_at' => now(),//現在の時刻を入れるメソッド
            //なお、対応するmigrationファイルにtimestamps()のカラムがないとエラーになる
            //idのカラムは要らない
        ]);

        \App\Models\User::create([
            'name' => '渋沢栄一',
            'email' => 'I-am-new-ichimanyen@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('seiten0tsuke'), // パスワードをハッシュ化する関数
            'role' =>'0',
            'created_at' => now(),//php artisan db:seed --class=CategorySeeder（<--今回のseeder名）をひたすら繰り返す
            'updated_at' => now(),//現在の時刻を入れるメソッド
            //なお、対応するmigrationファイルにtimestamps()のカラムがないとエラーになる
            //idのカラムは要らない
        ]);
    }
}
