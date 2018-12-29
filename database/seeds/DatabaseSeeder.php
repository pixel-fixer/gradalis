<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use TruncateTable;
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        Schema::disableForeignKeyConstraints();
        $this->truncateMultiple([
            'businesses',
            'business_categories',
            'languages',
            'countries',
            'cities',
            'users',
        ]);
        Schema::enableForeignKeyConstraints();

        $this->call(UserTableSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);

        Model::reguard();
    }
}
