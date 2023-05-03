<?php

use Illuminate\Database\Seeder;
use App\Models\Users\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $users = [
                [
                    'over_name' => '深川',
                    'under_name' => '利昭',
                    'over_name_kana' => 'フカガワ',
                    'under_name_kana' => 'トシアキ',
                    'mail_address' => 'hukagawa@example.com',
                    'sex' => '1',
                    'birth_day' => '1981-01-17',
                    'role' => '2',
                    'password' => bcrypt('password'),
                ],
                [
                    'over_name' => '八幡',
                    'under_name' => '敬治',
                    'over_name_kana' => 'ヤハタ',
                    'under_name_kana' => 'ケイジ',
                    'mail_address' => 'keiji@example.com',
                    'sex' => '1',
                    'birth_day' => '1996-05-06',
                    'role' => '1',
                    'password' => bcrypt('password'),
                ],
                [
                    'over_name' => '柄崎',
                    'under_name' => '由美',
                    'over_name_kana' => 'カラサキ',
                    'under_name_kana' => 'ユミ',
                    'mail_address' => 'y-karasaki@example.com',
                    'sex' => '2',
                    'birth_day' => '1993-11-23',
                    'role' => '3',
                    'password' => bcrypt('password'),
                ],
                [
                    'over_name' => '金辺',
                    'under_name' => '真規',
                    'over_name_kana' => 'カナベ',
                    'under_name_kana' => 'マキ',
                    'mail_address' => 'makimaki@example.com',
                    'sex' => '2',
                    'birth_day' => '2002-09-10',
                    'role' => '4',
                    'password' => bcrypt('password'),
                ],
                [
                    'over_name' => '井崎',
                    'under_name' => '宇宙',
                    'over_name_kana' => 'イサキ',
                    'under_name_kana' => 'ソラ',
                    'mail_address' => 'sky@example.com',
                    'sex' => '3',
                    'birth_day' => '2003-03-15',
                    'role' => '4',
                    'password' => bcrypt('password'),
                ],
            ];
            DB::table('users')->insert($users);
        }
    }
