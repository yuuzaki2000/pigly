<?php

namespace Database\Seeders;

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
        $data = [
            'name' => 'masanori',
            'email' => 'masanori4680@gmail.com',
            'password' => bcrypt('masanori0813'),
        ];
        DB::table('users')->insert($data);
    }
}
