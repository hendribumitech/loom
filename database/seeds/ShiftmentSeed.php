<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ShiftmentSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        \DB::table('shiftments')->delete();
        \DB::table('shiftments')->insert([
            [                       
                'code' => 'SHFT1',                         
                'name' => 'Shift 1',
                'start_hour' => '08:00:00',
                'end_hour' => '15:59:59',
                'overday' => 0,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ],
            [                       
                'code' => 'SHFT2',                         
                'name' => 'Shift 2',
                'start_hour' => '16:00:00',
                'end_hour' => '23:59:59',
                'overday' => 0,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ],
            [                       
                'code' => 'SHFT3',                    
                'name' => 'Shift 3',
                'start_hour' => '00:00:00',
                'end_hour' => '07:59:59',
                'overday' => 1,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ]
        ]);
    }
}
