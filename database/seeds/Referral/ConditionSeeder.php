<?php

use App\Models\Referral\Campaign;
use App\Models\Referral\Condition;
use Illuminate\Database\Seeder;

class ConditionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $condition = new Condition();
        $nameTranslations = [
          'ru' => 'Email',
          'en' => 'Email',
          'pl' => 'Email',
        ];
        $condition->setTranslations('name',$nameTranslations);
        $condition->save();

        $condition = new Condition();
        $nameTranslations = [
          'ru' => 'Контекстная реклама',
          'en' => 'Contextual advertising',
          'pl' => 'Reklama kontekstowa',
        ];
        $condition->setTranslations('name',$nameTranslations);
        $condition->save();

        $campaigns = Campaign::all();
        $conditions = Condition::all();
        foreach ($campaigns as $campaign) {
            foreach ($conditions as $condition){
                $campaign->conditions()->attach([$condition->id=>['status'=>rand(0,1)]]);
            }
        }
        Schema::enableForeignKeyConstraints();
    }
}
