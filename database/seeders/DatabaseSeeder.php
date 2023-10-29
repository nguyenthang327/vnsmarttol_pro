<?php

namespace Database\Seeders;

use Exception;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DatabaseSeeder extends Seeder
{  
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try{
            DB::beginTransaction();
            $this->call([
                RoleSeeder::class,
                UserSeeder::class,
            ]);
            DB::commit();
        }catch(Exception $e){
            DB::rollBack();
            Log::error('[DatabaseSeeder] error: ' . $e->getMessage());
        }
    }
}
