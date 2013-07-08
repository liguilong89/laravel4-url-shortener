<?php

class ShorturlsTableSeeder extends Seeder {

    public function run()
    {
    	// Uncomment the below to wipe the table clean before populating
    	DB::table('shorturls')->delete();

        $shorturls = array(
            array(
                'long_url'   => 'http://www.baidu.com',
                'short_code' => '1',
                'clicks'     => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
            array(
                'long_url'   => 'http://www.google.com',
                'short_code' => '2',
                'clicks'     => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),            
            array(
                'long_url'   => 'http://www.v2ex.com',
                'short_code' => '3',
                'clicks'     => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),          
            array(
                'long_url'   => 'http://www.oschina.net',
                'short_code' => '4',
                'clicks'     => 2,
                'created_at' => new DateTime,
                'updated_at' => new DateTime,
            ),
        );

        DB::table('shorturls')->insert( $shorturls );


        // Uncomment the below to run the seeder
        // DB::table('shorturls')->insert($shorturls);
    }

}