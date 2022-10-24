<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UomSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        \DB::table('uoms')->delete();
        \DB::table('uoms')->insert([
            [                       
                'code' => 'KG',                         
                'name' => 'Kilogram',
                'category' => 'weight',
                'types' => 'reference',
                'ratio' => 1,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ],
            [                       
                'code' => 'GR',                         
                'name' => 'Gram',
                'category' => 'weight',
                'types' => 'smaller',
                'ratio' => 0.01,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ],
            [                       
                'code' => 'ONS',                         
                'name' => 'Ons',
                'category' => 'weight',
                'types' => 'smaller',
                'ratio' => 0.1,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ],
            [                       
                'code' => 'TON',                         
                'name' => 'Ton',
                'category' => 'weight',
                'types' => 'bigger',
                'ratio' => 1000,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ],
            [                       
                'code' => 'KW',                         
                'name' => 'Kuintal',
                'category' => 'weight',
                'types' => 'bigger',
                'ratio' => 100,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ],
            [                       
                'code' => 'HR',                 
                'name' => 'Hour',
                'category' => 'duration',
                'types' => 'reference',
                'ratio' => 1,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ],            
            [   
                'code' => 'DAY',                 
                'name' => 'Day',
                'category' => 'duration',
                'types' => 'bigger',
                'ratio' => 24,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ],
            [   
                'code' => 'SHIFT7',                 
                'name' => 'Shift 7',
                'category' => 'duration',
                'types' => 'bigger',
                'ratio' => 168,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ],
            [   
                'code' => 'SHIFT8',                 
                'name' => 'Shift 8',
                'category' => 'duration',
                'types' => 'bigger',
                'ratio' => 192,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ],
            [                       
                'code' => 'HHR',                 
                'name' => 'Half Hour',
                'category' => 'duration',
                'types' => 'smaller',
                'ratio' => 0.33333,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ],
            [                       
                'code' => 'MIN',                 
                'name' => 'Minutes',
                'category' => 'duration',
                'types' => 'smaller',
                'ratio' => 0.01667,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ],[   
                'code' => 'SEC',                 
                'name' => 'Seconds',
                'category' => 'duration',
                'types' => 'smaller',
                'ratio' => 0.00028,                
                'updated_at' => '2021-10-26 22:21:21',
                'created_at' => '2021-10-26 22:21:21',
                'created_by' => 1,
            ],
            ]);
    }
}
