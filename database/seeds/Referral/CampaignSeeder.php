<?php

use App\Models\Auth\User;
use App\Models\Business\Business;
use App\Models\Franchise\Franchise;
use App\Models\Referral\Campaign;
use App\Models\Referral\CampaignResource;
use App\Models\Referral\Invitation;
use App\Models\Referral\InvitationCounter;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

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
        $partners = \App\Models\Referral\Partner::all();
        $faker = \Faker\Factory::create();
        foreach ($businesses as $business) {
            $names = [
                'ru' => 'Лндинг',
                'en' => 'Landing',
                'pl' => 'Lądowanie',
            ];
            $campaign = new Campaign([
                'name'      => json_encode($names),
                'target_id' => $business->id,
                'type'      => 1,
                'status'    => rand(0, 1)
            ]);
            $campaign->setTranslations('name',$names);
            $campaign->save();
        }
        foreach ($franshises as $franchise) {
            $names = [
                'ru' => 'Лндинг',
                'en' => 'Landing',
                'pl' => 'Lądowanie',
            ];
            $campaign = new Campaign([
                'name'      => json_encode($names),
                'target_id' => $franchise->id,
                'type'      => 2,
                'status'    => rand(0, 1)
            ]);
            $campaign->setTranslations('name',$names);
            $campaign->save();
            $campaignResource = CampaignResource::create([
                'name'        => $franchise->name,
                'url'         => $franchise->id,
                'type'        => 1,
                'width'       => 250,
                'height'      => 250,
                'campaign_id' => $campaign->id
            ]);
            foreach ($partners as $partner) {

                $token = Invitation::makeToken();
                Invitation::create([
                    'partner_id'           => $partner->id,
                    'campaign_id'          => $campaign->id,
                    'campaign_resource_id' => $campaignResource->id,
                    'token'                => $token,
                    'status'               => rand(0, 2),
                ]);


                foreach (Invitation::all() as $invitation) {
                    factory(User::class, 2)->create()->each(function ($user) use ($invitation, $faker) {
                        $date = Carbon::now()->subDays(random_int(1, 370))->format('Y-m-d H:i:s');
                        $status = rand(0, 2);
                        $data = [
                            'invitation_id' => $invitation->id,
                            'created_at'    => $date,
                            'updated_at'    => $date,
                            'status'        => $status,
                            'ip'            => $faker->ipv4,
                            'token'         => $invitation->token,
                            'count'         => rand(1, 7),
                            'http_referrer' => 'https://google.com',
                            'invitation_id' => $invitation->id
                        ];
                        if ($status > 0) {
                            $data['user_id'] = $user->id;
                        }
                        InvitationCounter::create($data);
                    });
                }
            }
        }

        Schema::enableForeignKeyConstraints();
    }
}
