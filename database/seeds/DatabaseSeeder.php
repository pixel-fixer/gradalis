<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use App\Models\Service\ServiceCategory;

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
            'roles',
            'model_has_roles',
            'model_has_permissions',
            'role_has_permissions',
            'permissions',
            'businesses',
            'business_categories',
            'franchises',
            'franchise_categories',
            'franchise_packages',
            'languages',
            'countries',
            'cities',
            'users',
            'campaigns',
            'campaign_resources',
            'conditions',
            'partners',
            'campaign_condition',
            'campaign_targets',
            'invitations',
            'invitation_counter',
            'services',
            'ordered_services',
            'travels',
            'flights',
            'hotels',
            'meetings',
            'consultations',
            'dialogs',
            'admin_notifications',
            'service_categories',
            'payment_transactions',
            'view_requests'
        ]);

        Schema::enableForeignKeyConstraints();

        $this->call(UserTableSeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(LanguagesSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(DistrictSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(BusinessSeeder::class);
        $this->call(FranchiseSeeder::class);
        $this->call(FranchisePackageSeeder::class);


        $this->call(ReferralUsersSeeder::class);
        $this->call(PartnerSeeder::class);
        $this->call(CampaignSeeder::class);
        $this->call(ConditionSeeder::class);
        $this->call(ServiceCategorySeeder::class);
        $this->call(ServicesSeeder::class);
        $this->call(OrderedServicesSeeder::class);
        $this->call(TravelsSeeder::class);
        $this->call(FlightsSeeder::class);
        $this->call(HotelsSeeder::class);
        $this->call(MeetingsSeeder::class);
        $this->call(ConsultationsSeeder::class);
        $this->call(DialogSeeder::class);
        $this->call(AdminNofiticationSeeder::class);
        $this->call(PaymentTransactionSeeder::class);
        $this->call(ViewRequestSeeder::class);

        Model::reguard();
    }
}
