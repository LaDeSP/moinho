<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StatusTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(ReportTableSeeder::class);
        $this->call(ReportRoleTableSeeder::class);
        $this->call(JoinTableSeeder::class);
        $this->call(TypeTableSeeder::class);
        $this->call(ColumnTableSeeder::class);
        $this->call(ConditionTableSeeder::class);
    }
}
