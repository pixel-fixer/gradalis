<?php

use App\Models\Auth\User;
use App\Models\Business\Business;
use App\Models\Franchise\Franchise;
use App\Models\Referral\Campaign;
use App\Models\Referral\CampaignResource;
use App\Models\Referral\CampaignTarget;
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
        $description = <<<DESCRIPTION
            Банк Хоум Кредит занимает лидерские позиции на рынке финансовой розницы России. Входит в ТОП-10 по кредитам физическим лицам, занимает первое место на рынке потребительских кредитов в точках продаж.

            Тариф дебетовой карты "Польза":
            
            7% — при остатке менее 300000 ₽ и совершении покупок на сумму не менее 5000 ₽. в мес.
            3% — на сумму превышения 300000 ₽ и совершении покупок на сумму не менее 5000 ₽ в мес.
            0 % — в остальных случаях, выплачиваются ежемесячно.
            за получение наличных в любых банкоматах и кассах других банков по первым пяти операциям в мес. РП длится в течение календарного месяца с первого и по последнее число.

DESCRIPTION;

        Schema::disableForeignKeyConstraints();
        $businesses = Business::all();
        $franshises = Franchise::all();
        $partners = \App\Models\Referral\Partner::all();
        $faker = \Faker\Factory::create();
        foreach ($businesses as $business) {
            $names = [
                'ru' => $faker->name(),
                'en' => $faker->name(),
                'pl' => $faker->name(),
            ];
            $campaign = new Campaign([
                'name'       => $business->name,
                'target_id'  => $business->id,
                'type'       => 'App\Models\Business\Business',
                'country_id' => rand(1, 2),
                'site'       => 'http://google.com',
                'status'     => rand(0, 1)
            ]);

            $campaign->setTranslation('description', 'ru', $description);
            $campaign->save();
            $campaignTarget = CampaignTarget::create([
                'name'        => 'Активная дебетовая карта',
                'campaign_id' => $campaign->id,
                'country_id'  => rand(1, 2),
                'cpl'         => rand(10, 30) . '%',
                'cps'         => rand(10, 30) . '%'
            ]);
            for ($i = 0; $i <= 4; $i++) {
                $type = rand(1, 2);
                $campaignResource = CampaignResource::create([
                    'url'           => 'http://google.com',
                    'type'          => $type,
                    'resource_type' => ($type === 2) ? rand(2, 3) : 1,
                    'width'         => ($type === 2) ? 250 : null,
                    'height'        => ($type === 2) ? 250 : null,
                    'campaign_id'   => $campaign->id
                ]);
                $campaignResource->setTranslations('name', $names);
                $campaignResource->save();
            }
        }
        foreach ($franshises as $franchise) {
            $names = [
                'ru' => $faker->name(),
                'en' => $faker->name(),
                'pl' => $faker->name(),
            ];
            $campaign = new Campaign([
                'name'       => $franchise->name,
                'target_id'  => $franchise->id,
                'type'       => 'App\Models\Franchise\Franchise',
                'country_id' => rand(1, 2),
                'site'       => 'http://google.com',
                'status'     => rand(0, 1)
            ]);

            $campaign->setTranslation('description', 'ru', $description);
            $campaign->save();
            $campaignTarget = CampaignTarget::create([
                'name'        => 'Активная дебетовая карта',
                'campaign_id' => $campaign->id,
                'country_id'  => rand(1, 2),
                'cpl'         => rand(10, 30) . '%',
                'cps'         => rand(10, 30) . '%'
            ]);
            for ($i = 0; $i <= 4; $i++) {
                $type = rand(1, 2);
                $campaignResource = CampaignResource::create([
                    'url'         => 'http://google.com',
                    'type'        => $type,
                    'resource_type' => ($type === 2) ? rand(2, 3) : 1,
                    'width'       => ($type === 2) ? 250 : null,
                    'height'      => ($type === 2) ? 250 : null,
                    'campaign_id' => $campaign->id
                ]);
                $campaignResource->setTranslations('name', $names);
                $campaignResource->save();
            }
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
