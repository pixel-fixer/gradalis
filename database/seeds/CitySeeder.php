<?php

use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $csv = storage_path('app/data/city.csv');
        $query = sprintf("LOAD DATA local INFILE '%s' INTO TABLE cities FIELDS TERMINATED BY ';' OPTIONALLY ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\\n' IGNORE 0 LINES (`country_id`, `name`)", addslashes($csv));
        DB::connection()->getpdo()->exec($query);
        Schema::enableForeignKeyConstraints();
    }
}
