<?php

use App\Models\Auth\User;
use App\Models\Business\Business;
use App\Models\Franchise\Franchise;
use App\Models\Referral\Campaign;
use App\Models\Referral\CampaignResource;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Models\Referral\InvitationCounter;
use App\Models\Referral\Invitation;

class CampaignSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $businesses = Business::all();
        $franshises = Franchise::all();
        $partners   = \App\Models\Referral\Partner::all();
        $faker      = \Faker\Factory::create();
        foreach ($businesses as $business) {
            $names = [
                'ru' => 'Лндинг',
                'en' => 'Landing',
                'pl' => 'Lądowanie',
            ];
            Campaign::create([
                'name'      => json_encode($names),
                'target_id' => $business->id,
                'type'      => 1,
                'status'    => rand(0, 1)
            ]);
        }
        foreach ($franshises as $franshise) {
            $names            = [
                'ru' => 'Лндинг',
                'en' => 'Landing',
                'pl' => 'Lądowanie',
            ];
            $campaign         = Campaign::create([
                'name'      => json_encode($names),
                'target_id' => $franshise->id,
                'type'      => 2,
                'status'    => rand(0, 1)
            ]);
            $campaignResource = CampaignResource::create([
                'name'        => $franshise->name,
                'url'         => $franshise->id,
                'type'        => 1,
                'width'       => 250,
                'height'      => 250,
                'campaign_id' => $campaign->id
            ]);
            foreach ($partners as $partner) {
                $date = Carbon::now()->addDays(random_int(30, 450))->format('Y-m-d H:i:s');

                factory(User::class, 3)->create()->each(function ($user) use ($partner, $campaign, $faker, $campaignResource) {
                    $invitation = Invitation::create([
                        'user_id'              => $user->id,
                        'partner_id'           => $partner->id,
                        'campaign_id'          => $campaign->id,
                        'campaign_resource_id' => $campaignResource->id,
                        'token'                => strtolower(str_random(16)),
                        'status'               => rand(0, 2),
                        'ip'                   => $faker->ipv4,
                        'http_referrer'        => 'https://google.com'
                    ]);
                    $user->save();

                    factory(InvitationCounter::class, 3)->create([
                        'invitation_id' => $invitation->id,
                        'created_at'    => $invitation->id,
                        'invitation_id' => $invitation->id
                    ]);
                });
            }
        }
        Schema::enableForeignKeyConstraints();
    }
}
