<?php

return [

    /*
     * If a translation has not been set for a given locale, use this locale instead.
     */
    'fallback_locale' => 'ru',
    'source' => 'database',

    /*
     * If you choose array selection, you should add all supported translation on it as "code" => "label"
     */
    'locales' => [
        'ru' => 'Русский',
        'en' => 'English',
        'pl' => 'Polski',
    ],

    /*
     * If you choose database selection, you should choose the model responsible for retrieving supported translations
     * And choose the 'code_field' for example "en","ar","ru"...
     * And choose the 'label_field' which will be show for users, for example "English","EN", ....
     */
    'database' => [
        'model' => 'App\\Models\\Language',
        'code_field' => 'lang',
        'label_field' => 'name'
    ],
];
