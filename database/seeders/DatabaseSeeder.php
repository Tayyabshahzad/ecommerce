<?php

use Database\Seeders\MyCouponSeeder;
use Database\Seeders\MySettingSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\SettingsSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
            $this->call(UserSeeder::class);
            $this->call(MySettingSeeder::class);
            $this->call(MyCouponSeeder::class);
         //   $this->call(SettingsSeeder::class);
           // $this->call(SettingTableSeeder::class);
        // $this->call(CouponSeeder::class);


    }
}
