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
        'description'               => [
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
        'price'                     => [
            'title'       => 'Цена долей или акций',
            'placeholder' => 100000
        ],
        'profitability'             => [
            'title'       => 'Чистая средняя годовая прибыль',
            'placeholder' => 1000000
        ],
        'netAverageQuarterlyProfit' => [
            'title'       => 'Чистая средняя квартальная прибыль',
            'placeholder' => 50000
        ],
        'revenue'                   => [
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
        'payback'                   => [
            'title'       => 'Позитивный сценарий',
            'placeholder' => 12
        ],
        'negativeScenario'          => [
            'title'       => 'Негативный сценарий',
            'placeholder' => 36
        ],
        //endregion
        //region Step 3
        'categoryProperty'          => [
            'title'       => 'Тип собственности объекта',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Собственность'],
                ['id' => 2, 'name' => 'Долевая собственность'],
                ['id' => 3, 'name' => 'Совместное владение супружеской собственностью'],
            ]
        ],
        'typeProperty'              => [
            'title'       => 'Тип собственности объекта',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Недвижимость/землья общего назначения  '],
                ['id' => 2, 'name' => 'Недвижимость сельско-хозяйского назначения'],
                ['id' => 3, 'name' => 'Недвижимость со зданиямии'],
                ['id' => 4, 'name' => 'Отдельная коммерческая собственная квартира/помещение'],
                ['id' => 5, 'name' => 'Отдельнoe собственнoe жилье/квартира'],
                ['id' => 6, 'name' => 'Отдельнoe собственнoe коммерческое помещение'],
                ['id' => 7, 'name' => 'Отдельнoe собственнoe жилое помещение'],
            ]
        ],
        'numberSquareMeters'        => [
            'title'       => 'Количество кв. метров',
            'placeholder' => 12,
            'prevText'     => 'кв.м.',
        ],
        'priceSquareMeters'        => [
            'title'       => 'Цена за кв. метр',
            'placeholder' => 1000,
        ],
        'priceIncludingVAT'        => [
            'title'       => 'Цена с учетом НДС',
        ],
        'titleDocuments' => [
            'title'       => 'Правоустанавливающие документы',
        ],
        'restrictionsOperation' => [
            'title'       => 'Огрничения по эксплуатции',
        ],
        'listRestrictionsOperation' => [
            'title'       => 'Укажите ограничения',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Ипотека'],
                ['id' => 2, 'name' => 'Залог на речиях находящих в помещении'],
                ['id' => 3, 'name' => 'Ограниченное право собственности - сервитут прохода и транзита определённых лиц'],
                ['id' => 4, 'name' => 'Ограниченное право собственности'],
                ['id' => 5, 'name' => 'Ограниченное право собственности - сервитут передачи'],
                ['id' => 6, 'name' => 'Ограниченное право собственности - сервитут пожизненной квартиры'],
                ['id' => 7, 'name' => 'Долгосрочный прокат (аренда)'],
                ['id' => 8, 'name' => 'Аренда'],
            ]
        ],
        'refRegisterEstate'        => [
            'title'       => 'Справка из регистра недв. и зданий',
        ],
        'technicalPropertyPlan' => [
            'title'       => 'Технический план недвижимости',
        ],
        'coordinationRedevelopment' => [
            'title'       => 'Согласование перепланировок',
        ],
        'availabilityMortgage' => [
            'title'       => 'Наличие ипотеки по объекту',
        ],
        'totalAmountMortgage'        => [
            'title'       => 'Общая сумма ипотеки',
            'placeholder' => 1000,
        ],
        'repaidAmountMortgage'        => [
            'title'       => 'Погашенная сумма',
            'placeholder' => 1000,
        ],
        'balanceMortgage'        => [
            'title'       => 'Остаток суммы ипотеки',
            'placeholder' => 1000,
        ],
        'monthlyPaymentMortgage'        => [
            'title'       => 'Ежемесячный платёж',
            'placeholder' => 1000,
        ],
        'finalPaymentMortgageDate'        => [
            'title'       => 'Окончательный срок выплаты',
            'placeholder' => '25.02.2020',
        ],
        //endregion
    ],

];
