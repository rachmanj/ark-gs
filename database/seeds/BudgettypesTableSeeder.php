<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BudgettypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sql = file_get_contents(database_path() . '/seeds/budgettypes.sql');

        DB::statement($sql);
    }
}
