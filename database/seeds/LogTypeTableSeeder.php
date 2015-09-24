<?php

use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
use Laracasts\TestDummy\Factory as TestDummy;

class LogTypeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('log_types')->insert(
        array(
                array('id' => 1, 'type' => 'Voltage'),
                array('id' => 2, 'type' => 'Ampere'),
                array('id' => 3, 'type' => 'Pressure'),                                
        ));
    }
}
