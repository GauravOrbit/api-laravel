<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon;

class ApiUsersTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('users')->truncate();


        $data['name'] = 'webapi';
        $data['email'] = 'web@api.com';
        $data['password'] = bcrypt('7u8i9o0p');
        $data['created_at'] = Carbon::now();            
        $data['updated_at'] = Carbon::now();
        DB::table('users')->insert(
            $data
        );

        $data['name'] = 'iosapi';
        $data['email'] = 'ios@api.com';
        $data['password'] = bcrypt('7u8i9o0p');
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        DB::table('users')->insert(
            $data
        );

        $data['name'] = 'androidapi';
        $data['email'] = 'android@api.com';
        $data['password'] = bcrypt('7u8i9o0p');
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        DB::table('users')->insert(
            $data
        );
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
    
}