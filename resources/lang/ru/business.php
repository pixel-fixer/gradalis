<?php

return [
    'category' => 'Категория бизнеса',
    'index'    => [
        'title'    => 'Купить готовый бизнес в Польше',
        'category' => 'Категория',
    ],
    'create'   => [
        'title'                     => 'Продать бизнес',
        'help'                      => '<span class="has-text-weight-bold">Не хотите заполнять?</span>&nbsp;<span>Наш менеджер поможет вам!</span>',
        'btn_more'                  => 'Подробнее',
        'main_info'                 => 'Основная информация',
        'finance_info'              => 'Финансовые показатели',
        'labelReturnInvestment'     => 'Окупаемость вложенных средств',
        'sold_success'              => 'Успех на продажу бизнеса',
        'add_address'               => 'Добавить еще один адрес',
        'remove_address'            => 'Удалить этот адрес',
        //region Step 1
        'address'                   => [
            'title'       => 'Адрес бизнеса',
            'placeholder' => 'Укажите адрес',
        ],
        'numberHouse'               => [
            'title'       => 'Номер дома',
            'placeholder' => '№',
        ],
        'housingHouse'              => [
            'title'       => 'Корпус дома',
            'placeholder' => 'Корпус',
        ],
        'numberOffice'              => [
            'title'       => 'Номер офиса',
            'placeholder' => '№',
        ],
        'index'                     => [
            'title'       => 'Индекс',
            'placeholder' => 01001,
        ],
        'nameLegalEntity'           => [
            'title'       => 'Название юр.лица',
            'placeholder' => 'Укажите название'
        ],
        'partBusiness'              => [
            'title' => 'Продается весь бизнес?',
            'list'  => [
                [
                    'title' => 'Весь бизнес',
                    'value' => 'all'
                ],
                [
                    'title' => 'Доля компании',
                    'value' => 'part'
                ],
                [
                    'title' => 'Акции компании',
                    'value' => 'stock'
                ]
            ]
        ],
        'numberShares'              => [
            'title'       => 'Количество долей или акций',
            'placeholder' => 75
        ],
        'description'       => [
            'title'       => 'Описание бизнеса',
            'placeholder' => 'Опишите продаваемый бизнес'
        ],
        'yearFoundationBusiness'    => [
            'title'       => 'Год основания бизнеса',
            'placeholder' => 2007
        ],
        'reasonSale'                => [
            'title'       => 'Причина продажи',
            'placeholder' => 'Опишите причину продажи'
        ],
        'nameVideoReview'           => [
            'title'       => 'Название видеообзора',
            'placeholder' => 'Укажите название видеообзора'
        ],
        'linkVideoReview'           => [
            'title'       => 'Видеобзор бизнеса',
            'placeholder' => 'http://'
        ],
        'theme'                     => [
            'title'   => 'Тематика безнеса',
            'options' => [
                ['id' => 1, 'name' => 'Item1'],
                ['id' => 2, 'name' => 'Item2'],
                ['id' => 3, 'name' => 'Item3'],
                ['id' => 4, 'name' => 'Item4'],
            ]
        ],
        'name'                      => [
            'title'       => 'Название бизнеса',
            'placeholder' => 'Укажите название'
        ],
        //endregion
        //region Step 2
        'price'               => [
            'title'       => 'Цена долей или акций',
            'placeholder' => 100000
        ],
        'profitability'    => [
            'title'       => 'Чистая средняя годовая прибыль',
            'placeholder' => 1000000
        ],
        'netAverageQuarterlyProfit' => [
            'title'       => 'Чистая средняя квартальная прибыль',
            'placeholder' => 50000
        ],
        'revenue'     => [
            'title'       => 'Средний годовой оборот',
            'placeholder' => 10000000
        ],
        'averageQuarterlyTurnover'  => [
            'title'       => 'Средний квартальный оборот',
            'placeholder' => 500000
        ],
        'costBusinessPerYear'       => [
            'title'       => 'Затраты на коммерческую деятельность в год',
            'placeholder' => 25000
        ],
        'costBusinessPerQuarter'    => [
            'title'       => 'Затраты на коммерческую деятельность в квартал',
            'placeholder' => 100000
        ],
        'payback'          => [
            'title'       => 'Позитивный сценарий',
            'placeholder' => 12
        ],
        'negativeScenario'          => [
            'title'       => 'Негативный сценарий',
            'placeholder' => 36
        ],
        //endregion
    ],

];
