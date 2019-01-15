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
            'franchises',
            'franchise_categories',
            'franchise_packages',
            'languages',
            'countries',
            'cities',
            'users',
            'services',
            'ordered_services',
            'travels',
            'flights',
            'hotels',
            'meetings',
            'consultations',
        ]);
        Schema::enableForeignKeyConstraints();

        $this->call(UserTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(CitySeeder::class);
        $this->call(BusinessSeeder::class);
        $this->call(FranchiseSeeder::class);
        $this->call(FranchisePackageSeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(OrderedServicesSeeder::class);
        $this->call(TravelsSeeder::class);
        $this->call(FlightsSeeder::class);
        $this->call(HotelsSeeder::class);
        $this->call(MeetingsSeeder::class);
        $this->call(ConsultationsSeeder::class);

        Model::reguard();
    }
}
