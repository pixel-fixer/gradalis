<?php

use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $csv   = storage_path('app/data/district.csv');
        $query = sprintf("LOAD DATA local INFILE '%s' INTO TABLE districts FIELDS TERMINATED BY ';' OPTIONALLY ENCLOSED BY '\"' ESCAPED BY '\"' LINES TERMINATED BY '\\n' IGNORE 0 LINES (`country_id`, `name`)", addslashes($csv));
        DB::connection()->getpdo()->exec($query);

        $districts = \App\Models\District::all();
        foreach ($districts as $district) {
            $name = $district->name;
            $district->setTranslation('translation','ru',$name);
            $district->save();
        }
        Schema::enableForeignKeyConstraints();
    }
}
