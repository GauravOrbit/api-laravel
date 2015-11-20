<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon as Carbon;

class OauthClientsTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('oauth_clients')->truncate();

        $data['id'] = 'web259ddd3ed8ff3843839b';
        $data['secret'] = '4c7f6f8fa93d59c45502c0ae8c4aweb';
        $data['name'] = 'web';
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        DB::table('oauth_clients')->insert(
            $data
        );

        $data['id'] = 'ios259ddd3ed8ff3843839b';
        $data['secret'] = '4c7f6f8fa93d59c45502c0ae8c4aios';
        $data['name'] = 'ios';
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        DB::table('oauth_clients')->insert(
            $data
        );
        
        $data['id'] = 'android259ddd3ed8ff3843839b';
        $data['secret'] = '4c7f6f8fa93d59c45502c0aeandroid';
        $data['name'] = 'android';
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();
        DB::table('oauth_clients')->insert(
            $data
        );

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}