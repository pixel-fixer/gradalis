<?php

return [
    'category' => 'Категория бизнеса',
    'index'    => [
        'title'    => 'Купить готовый бизнес в Польше',
        'category' => 'Категория',
    ],
    'create'   => [
        'title'                         => 'Продать бизнес',
        'help'                          => '<span class="has-text-weight-bold">Не хотите заполнять?</span>&nbsp;<span>Наш менеджер поможет вам!</span>',
        'btn_more'                      => 'Подробнее',
        'main_info'                     => 'Основная информация',
        'finance_info'                  => 'Финансовые показатели',
        'labelReturnInvestment'         => 'Окупаемость вложенных средств',
        'sold_success'                  => 'Успех на продажу бизнеса',
        'add_address'                   => 'Добавить еще один адрес',
        'remove_address'                => 'Удалить этот адрес',
        'add_object'                    => 'Добавить еще один объект',
        'remove_object'                 => 'Удалить объект',
        'add_contract'                  => 'Добавить еще один объект',
        'remove_contract'               => 'Удалить объект',
        'yn'                            => [
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Да'],
                ['id' => 2, 'name' => 'Нет']
            ]
        ],
        'have'                          => [
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Есть'],
                ['id' => 2, 'name' => 'Нет']
            ]
        ],
        //region Step 1
        'address'                       => [
            'title'       => 'Адрес бизнеса',
            'placeholder' => 'Укажите адрес',
        ],
        'numberHouse'                   => [
            'title'       => 'Номер дома',
            'placeholder' => '№',
        ],
        'housingHouse'                  => [
            'title'       => 'Корпус дома',
            'placeholder' => 'Корпус',
        ],
        'numberOffice'                  => [
            'title'       => 'Номер офиса',
            'placeholder' => '№',
        ],
        'index'                         => [
            'title'       => 'Индекс',
            'placeholder' => 01001,
        ],
        'nameLegalEntity'               => [
            'title'       => 'Название юр.лица',
            'placeholder' => 'Укажите название'
        ],
        'partBusiness'                  => [
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
        'numberShares'                  => [
            'title'       => 'Количество долей или акций',
            'placeholder' => 75
        ],
        'description'                   => [
            'title'       => 'Описание бизнеса',
            'placeholder' => 'Опишите продаваемый бизнес'
        ],
        'yearFoundationBusiness'        => [
            'title'       => 'Год основания бизнеса',
            'placeholder' => 2007
        ],
        'reasonSale'                    => [
            'title'       => 'Причина продажи',
            'placeholder' => 'Опишите причину продажи'
        ],
        'nameVideoReview'               => [
            'title'       => 'Название видеообзора',
            'placeholder' => 'Укажите название видеообзора'
        ],
        'linkVideoReview'               => [
            'title'       => 'Видеобзор бизнеса',
            'placeholder' => 'http://'
        ],
        'theme'                         => [
            'title'   => 'Тематика безнеса',
            'options' => [
                ['id' => 1, 'name' => 'Item1'],
                ['id' => 2, 'name' => 'Item2'],
                ['id' => 3, 'name' => 'Item3'],
                ['id' => 4, 'name' => 'Item4'],
            ]
        ],
        'name'                          => [
            'title'       => 'Название бизнеса',
            'placeholder' => 'Укажите название'
        ],
        //endregion
        //region Step 2
        'price'                         => [
            'title'       => 'Цена долей или акций',
            'placeholder' => 100000
        ],
        'profitability'                 => [
            'title'       => 'Чистая средняя годовая прибыль',
            'placeholder' => 1000000
        ],
        'netAverageQuarterlyProfit'     => [
            'title'       => 'Чистая средняя квартальная прибыль',
            'placeholder' => 50000
        ],
        'revenue'                       => [
            'title'       => 'Средний годовой оборот',
            'placeholder' => 10000000
        ],
        'averageQuarterlyTurnover'      => [
            'title'       => 'Средний квартальный оборот',
            'placeholder' => 500000
        ],
        'costBusinessPerYear'           => [
            'title'       => 'Затраты на коммерческую деятельность в год',
            'placeholder' => 25000
        ],
        'costBusinessPerQuarter'        => [
            'title'       => 'Затраты на коммерческую деятельность в квартал',
            'placeholder' => 100000
        ],
        'payback'                       => [
            'title'       => 'Позитивный сценарий',
            'placeholder' => 12
        ],
        'negativeScenario'              => [
            'title'       => 'Негативный сценарий',
            'placeholder' => 36
        ],
        //endregion
        //region Step 3
        'categoryProperty'              => [
            'title'       => 'Тип собственности объекта',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Собственность'],
                ['id' => 2, 'name' => 'Долевая собственность'],
                ['id' => 3, 'name' => 'Совместное владение супружеской собственностью'],
            ]
        ],
        'typeProperty'                  => [
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
        'numberSquareMeters'            => [
            'title'       => 'Количество кв. метров',
            'placeholder' => 12,
            'prevText'    => 'кв.м.',
        ],
        'priceSquareMeters'             => [
            'title'       => 'Цена за кв. метр',
            'placeholder' => 1000,
        ],
        'priceIncludingVAT'             => [
            'title' => 'Цена с учетом НДС',
        ],
        'titleDocuments'                => [
            'title' => 'Правоустанавливающие документы',
        ],
        'restrictionsOperation'         => [
            'title' => 'Огрничения по эксплуатции',
        ],
        'listRestrictionsOperation'     => [
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
        'refRegisterEstate'             => [
            'title' => 'Справка из регистра недв. и зданий',
        ],
        'technicalPropertyPlan'         => [
            'title' => 'Технический план недвижимости',
        ],
        'coordinationRedevelopment'     => [
            'title' => 'Согласование перепланировок',
        ],
        'availabilityMortgage'          => [
            'title' => 'Наличие ипотеки по объекту',
        ],
        'totalAmountMortgage'           => [
            'title'       => 'Общая сумма ипотеки',
            'placeholder' => 1000,
        ],
        'repaidAmountMortgage'          => [
            'title'       => 'Погашенная сумма',
            'placeholder' => 1000,
        ],
        'balanceMortgage'               => [
            'title'       => 'Остаток суммы ипотеки',
            'placeholder' => 1000,
        ],
        'monthlyPaymentMortgage'        => [
            'title'       => 'Ежемесячный платёж',
            'placeholder' => 1000,
        ],
        'finalPaymentMortgageDate'      => [
            'title'       => 'Окончательный срок выплаты',
            'placeholder' => '25.02.2020',
        ],
        'availabilityLoanSecuredObject' => [
            'title' => 'Наличие кредита под залог объекта',
        ],
        //
        'totalAmountCredit'             => [
            'title'       => 'Общая сумма кредита',
            'placeholder' => '1 000',
        ],
        'repaidAmountCredit'            => [
            'title'       => 'Погашенная сумма',
            'placeholder' => '1 000',
        ],
        'balanceCredit'                 => [
            'title'       => 'Остаток суммы кредита',
            'placeholder' => '1 000',
        ],
        'monthlyPaymentCredit'          => [
            'title'       => 'Ежемесячный платёж',
            'placeholder' => '1 000',
        ],
        'finalPaymentCreditDate'        => [
            'title'       => 'Окончательный срок выплаты',
            'placeholder' => '25.02.2020',
        ],
        'purposeCredit'                 => [
            'title'       => 'Назначение кредита',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Инвестиционный кредит'],
                ['id' => 2, 'name' => 'Кредит на машины и производственное оборудование'],
                ['id' => 3, 'name' => 'Кредит на ИТ технику'],
                ['id' => 4, 'name' => 'Кредит на средства транспорта для бизнеса'],
                ['id' => 5, 'name' => 'Кредит на покупку машины'],
                ['id' => 6, 'name' => 'Кредит на покупку недвижимости / квартиры'],
                ['id' => 7, 'name' => 'Кредит для погашения государственных задолженности - налоги и социальное страхование'],
                ['id' => 8, 'name' => 'Консолидационный кредит'],
                ['id' => 9, 'name' => 'Кредит для погашения задолженности перед контрагентами'],
                ['id' => 10, 'name' => 'Потребительский кредит'],
                ['id' => 11, 'name' => 'Кредит на обслуживание нового контракта'],
            ]
        ],
        'jointPropertyEstate'           => [
            'title'       => 'Совместная собственность недвижимости',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Долевая собственность'],
                ['id' => 2, 'name' => 'Совместное владение супружеской собственностью']
            ]
        ],
        'typeRelationshipCoowners'      => [
            'title'       => 'Тип взаимоотношений сообственников',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Долевая собственность'],
                ['id' => 2, 'name' => 'Совместное владение супружеской собственностью'],
            ]
        ],
        'monthlyUtilityCosts'           => [
            'title'       => 'Ежемесячные расходы на комуннальные платежи',
            'placeholder' => '1 000',
        ],
        'houseBookNumber'               => [
            'title'       => 'Номер домовой книги',
            'placeholder' => '№',
        ],
        'presenceChanging'              => [
            'title'       => 'Наличие чейнджа',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'costChanging'                  => [
            'title'       => 'Стоимость чейнджа',
            'placeholder' => '1 000',
        ],
        'leaseTermTo'                   => [
            'title'       => 'Срок аренды до',
            'placeholder' => '25.02.2020',
        ],
        //endregion
        //region Step 4
        'transferWorkSchemes'           => [
            'title' => 'Передаете ли схемы работы?',
        ],
        'monthTeach'                    => [
            'title'       => 'Сколько времени будете обучать?',
            'placeholder' => 1,
            'tooltip'     => 'tooltip text',
            'prevText'    => 'Месяцев'
        ],
        'readyTrainingMaterials'        => [
            'title' => 'Готовы ли обучающие материалы?',
        ],
        'typeTrainingMaterials'         => [
            'title'       => 'Тип обучающих материалов',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Электронный'],
                ['id' => 2, 'name' => 'Бумажный']
            ]
        ],
        'transferCustomerBase'          => [
            'title' => 'Передаёте базы клиентов?',
        ],
        'typeTransferCustomerBase'      => [
            'title'       => 'Тип передачи базы',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Excel'],
                ['id' => 2, 'name' => 'Бумажная']
            ],
        ],
        'haveContractors'               => [
            'title' => 'Есть ли контрагенты?'
        ],
        'contractors'                   => [
            'title'     => 'Контрагенты',
            'remove'    => 'Удалить этого контрагента',
            'add'       => 'Добавить контрагента',
            'direction' => [
                'title'       => 'Направление контрагента',
                'placeholder' => 'Выберите',
                'options'     => [
                    ['id' => 1, 'name' => 'Из интернета'],
                    ['id' => 2, 'name' => 'Из обявленний в прессе'],
                    ['id' => 3, 'name' => 'По рекомендации'],
                ],
            ],
            'name'      => [
                'title'       => 'Название юридического лица',
                'placeholder' => 'Укажите название',
            ],
            'phone'     => [
                'title'       => 'Телефон',
                'placeholder' => '+48 456 566-09-23',
            ],
            'mail'      => [
                'title'       => 'Почта',
                'placeholder' => 'agent@mail.com',
            ],
        ],
        'staff'                         => [
            'remove'                 => 'Удалить этого сотрудника',
            'add'                    => 'Добавить сотрудника',
            'title'                  => 'Персонал',
            'post'                   => [
                'title'       => 'Должность',
                'placeholder' => 'Выберите',
                'options'     => [
                    ['id' => 1, 'name' => 'Управленческий персонал'],
                    ['id' => 2, 'name' => 'Административный персонал'],
                    ['id' => 3, 'name' => 'Менаджеры высшей степении'],
                    ['id' => 4, 'name' => 'Рабочие занятые в производственном процессе'],
                    ['id' => 5, 'name' => 'Водители / доставчики'],
                    ['id' => 6, 'name' => 'Персонал обслуживающий клиентов'],
                ],
            ],
            'termsContractDismissal' => [
                'title'       => 'Условия договора об увольнении',
                'placeholder' => 'Выберите',
                'options'     => [
                    ['id' => 1, 'name' => '3 дня'],
                    ['id' => 2, 'name' => '1 неделя '],
                    ['id' => 3, 'name' => '2 недели'],
                    ['id' => 4, 'name' => '1 месядц'],
                    ['id' => 5, 'name' => '3 месядца'],
                ],
            ],
            'monthlyWages'           => [
                'title'       => 'Месячная заработная плата',
                'placeholder' => '1000',
            ],
            'taxAmountPerMonth'      => [
                'title'       => 'Сумма налогов, в месяц',
                'placeholder' => '1000',
            ],
        ],
        'willStaffLeave'                => [
            'title' => 'Уйдет ли персонал за собственником?',

        ],
        'havePurchasedServices'         => [
            'title' => 'Есть ли выкупленные долгосрочные услуги?',
        ],
        'neededLicenses'                => [
            'title' => 'Нужны ли сертификаты, лицензии, разрешения по виду деятельности?',
        ],
        'certificates'                  => [
            'title'         => 'Услуги и сертификаты',
            'remove'        => 'Удалить этот сертификат',
            'add'           => 'Добавить сертификат',
            'document'      => [
                'title'       => 'Укажите документ',
                'placeholder' => 'Выберите',
                'options'     => [
                    ['id' => 1, 'name' => 'Договор на труд'],
                    ['id' => 2, 'name' => 'Гражданско прововой договор'],
                    ['id' => 3, 'name' => 'Договор подряда'],
                ]
            ],
            'type'          => [
                'title'       => 'Укажите тип',
                'placeholder' => 'Выберите',
                'options'     => [
                    ['id' => 1, 'name' => 'Item'],
                    ['id' => 2, 'name' => 'Item'],
                    ['id' => 3, 'name' => 'Item'],
                ]
            ],
            'licensePeriod' => [
                'title'       => 'Срок действия лицензии',
                'placeholder' => '25.02.2020',
            ],
        ],
        //endregion
        //region Step 5
        'techDocEquipmentCD'            => [
            'title'       => 'Техническая документация на оборудование (чеки или договор)?',
            'placeholder' => 'Выберите',
        ],
        'techDocEquipment'              => [
            'title'       => 'Техническая документация на оборудование?',
            'placeholder' => 'Выберите',
        ],
        'conditionProperty'             => [
            'title'       => 'Состояние имущества (по оценке собственника)',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Очень хорошее'],
                ['id' => 2, 'name' => 'Хорошее'],
                ['id' => 3, 'name' => 'Средние'],
                ['id' => 4, 'name' => 'Плохое - нужно менять или ремонтировать'],
            ]
        ],
        'conditionEquipment'            => [
            'title'       => 'Состояние оборудования, транспорта, техники (по оценке собственника)',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Очень хорошее'],
                ['id' => 2, 'name' => 'Хорошее - минималный финансовый вклад'],
                ['id' => 3, 'name' => 'Хорошее - минималный финансовый вклад'],
                ['id' => 4, 'name' => 'Хорошее - минималный финансовый вклад'],
                ['id' => 5, 'name' => 'Среднее - требует немедленного финансового вклада'],
                ['id' => 6, 'name' => 'Плохое - требует немедленного ремонта или немедленной замены'],
            ]
        ],
        'pledgeEquipment'               => [
            'title'       => 'Залог на оборудование, транспорт и дугие материльные активы?',
            'placeholder' => 'Выберите',
            'options'     => [],
            'noResult'    => 'Ничего не найдено'
        ],

        'totalAmountCredit'    => [
            'title'       => 'Общая сумма кредита',
            'placeholder' => '1 000',
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],
        'repaidAmountCredit'   => [
            'title'       => 'Погашенная сумма',
            'placeholder' => '1 000',
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],
        'balanceCredit'        => [
            'title'       => 'Остаток суммы кредита',
            'placeholder' => '1 000',
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],
        'monthlyPaymentCredit' => [
            'title'       => 'Ежемесячный платёж',
            'placeholder' => '1 000',
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],

        'finalPaymentCreditDate'  => [
            'title'       => 'Окончательный срок выплаты',
            'placeholder' => '25.02.2020',
        ],
        'purposeCredit'           => [
            'selected'    => null,
            'title'       => 'Назначение кредита',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'кредит на новые средства транспорта для бизнеса'],
                ['id' => 2, 'name' => 'на ИТ технику'],
                ['id' => 3, 'name' => 'кредит на машины и производственное оборудование'],
                ['id' => 4, 'name' => 'инвестиционный кредит'],
                ['id' => 5, 'name' => 'кредит на обслуживание нового контракта'],
                ['id' => 6, 'name' => 'консолидационный кредит'],
                ['id' => 7, 'name' => 'кредит на покупку недвижимости / квартиры'],
                ['id' => 8, 'name' => 'кредит для погашения задолженности перед контрагентами'],
                ['id' => 9, 'name' => 'кредит для погашения государственных задолженности - налоги и социальное страхование'],
                ['id' => 10, 'name' => 'потребительский кредит'],
                ['id' => 11, 'name' => 'кредит на покупку машины'],
            ]
        ],
        'listTransferredProperty' => [
            'title'       => 'Перечень имущества передаваемого продавцом',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Настольный компьютеры'],
                ['id' => 2, 'name' => 'Мониторы'],
                ['id' => 3, 'name' => 'Лаптопы'],
                ['id' => 4, 'name' => 'Принтеры'],
                ['id' => 5, 'name' => 'Автофургон, вес до 3,5 тоны'],
                ['id' => 6, 'name' => 'Автофургон, вес oт 3,5 до 15 тон'],
                ['id' => 7, 'name' => 'Грузовой автомобиль, вес более  15 тонн'],
            ]
        ],

        'deductionsDepreciation'   => [
            'title'       => 'Отчисления на амортизцию',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Осуществляются'],
                ['id' => 2, 'name' => 'Не осуществляются'],
            ]
        ],
        'amountDeductionsProfits'  => [
            'title'       => 'Объем отчислений от прибыли',
            'placeholder' => 75,
            'tooltip'     => 'tooltip text',
            'prevText'    => '%',
        ],
        //endregion
        //region Step 6
        'saleSite'                 => [
            'title'       => 'Продается ли сайт?',
            'placeholder' => 'Выберите',
        ],
        'yearCreationSite'         => [
            'title'       => 'Год создания сайта',
            'placeholder' => 2010,
        ],
        'cms'                      => [
            'title'       => 'Система управления сайтом',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'themeSite'                => [
            'title'       => 'Тематика сайта',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Туризм'],
                ['id' => 2, 'name' => 'Торговля'],
                ['id' => 3, 'name' => 'Недвижимости'],
            ]
        ],
        'salePhone'                => [
            'title'       => 'Продается ли телефон?',
            'placeholder' => 'Выберите',
        ],
        'phone'                    => [
            'title'       => 'Номер телефона',
            'placeholder' => '880005553535',
            'tooltip'     => 'tooltip text'
        ],
        'intellectualProperty'     => [
            'title'       => 'Интеллектуальная собственность?',
            'placeholder' => 'Выберите',
        ],
        'intellectualPropertyList' => [
            'title'       => 'Укажите объекты интеллектуальной собственности',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Авторские права'],
                ['id' => 2, 'name' => 'Know how'],
                ['id' => 3, 'name' => 'Патенты'],
                ['id' => 4, 'name' => 'Торговая марка'],
                ['id' => 5, 'name' => 'Промышленный дизайн (полезная модель)']
            ]
        ],

        'visitorsPerDay'               => [
            'title'       => 'Посетителей в день',
            'placeholder' => 18300,
            'tooltip'     => 'tooltip text',
        ],
        'viewsPerDay'                  => [
            'title'       => 'Просмотров в день',
            'placeholder' => 12300,
            'tooltip'     => 'tooltip text',
        ],
        'natureTraffic'                => [
            'title'       => 'Характер трафика',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'sourcesTraffic'               => [
            'title'       => 'Источники трафика',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Google Adwords'],
                ['id' => 2, 'name' => 'Facebook Ads'],
            ]
        ],
        'sourceGoogle'                 => [
            'title'       => 'Источник: Google',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
        ],
        'sourceYandex'                 => [
            'title'       => 'Источник: Яндекс',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
        ],
        'additionalInformationTraffic' => [
            'title'       => 'Дополнительная информация по трафику',
            'placeholder' => 'Опишите дополнительную информацию по вашему трафику',
            'tooltip'     => 'tooltip text',
        ],

        'haveIncomeSite'               => [
            'title'       => 'Получаете ли доход из сайта?',
            'placeholder' => 'Выберите',
        ],
        'averageMonthlyIncome'         => [
            'title'       => 'Среднемесячный доход',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],
        'sourcesIncome'                => [
            'title'       => 'Источники дохода',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'contextualAdvertising'        => [
            'title'       => 'Контекстная реклама',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],
        'contextualAdvertisingGAdsens' => [
            'title'       => 'Из них Google Adsens',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],
        'bannerTizerNetworks'          => [
            'title'       => 'Баннерные и тизирные сети',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],
        'cpa'                          => [
            'title'       => 'CPA',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],
        'banMonetizationSystems'       => [
            'title' => 'Бан в системах монетизации',
        ],
        'additionalInformationIncome'  => [
            'title'       => 'Дополнительная информация по доходам',
            'placeholder' => 'Опишите дополнительную информацию по доходам',
            'tooltip'     => 'tooltip text',
        ],

        'averageMonthlyExpensesSite'        => [
            'title'       => 'Среднемесячный расход',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],
        'categoriesExpensesSite'            => [
            'title'       => 'Категории расходов',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'contentExpensesSite'               => [
            'title'       => 'Контент',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],
        'hostingExpensesSite'               => [
            'title'       => 'Хостинг и администрирование',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],
        'otherExpensesSite'                 => [
            'title'       => 'Иные расходы',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],
        'additionalInformationExpensesSite' => [
            'title'       => 'Дополнительная информация по расходам',
            'placeholder' => 'Опишите дополнительную информацию по расходам',
            'tooltip'     => 'tooltip text',
        ],

        'siteDesign' => [
            'title'       => 'Дизайн сайта',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],

        'imgSiteOwn'          => [
            'title'       => 'Собственные',
            'placeholder' => 50,
            'tooltip'     => 'tooltip text',
            'prevText'    => '%'
        ],
        'imgSiteOtherSources' => [
            'title'       => 'Из других источников',
            'placeholder' => 50,
            'tooltip'     => 'tooltip text',
            'prevText'    => '%'
        ],

        'textSiteCopyright'                => [
            'title'       => 'Копирайт',
            'placeholder' => 50,
            'tooltip'     => 'tooltip text',
            'prevText'    => '%'
        ],
        'textSiteManualRewrite'            => [
            'title'       => 'Ручной рерайт',
            'placeholder' => 50,
            'tooltip'     => 'tooltip text',
            'prevText'    => '%'
        ],
        'textSiteSavePaste'                => [
            'title'       => 'Копи-паст',
            'placeholder' => 50,
            'tooltip'     => 'tooltip text',
            'prevText'    => '%'
        ],
        'textSiteGenerated'                => [
            'title'       => 'Генерированый',
            'placeholder' => '50',
            'tooltip'     => 'tooltip text',
            'prevText'    => '%'
        ],
        'additionalInformationContentSite' => [
            'title'       => 'Дополнительная информация по контенту и дизайну',
            'placeholder' => 'Опишите дополнительную информацию по контенту и дизайну',
            'tooltip'     => 'tooltip text',
        ],
        'saleGroupsSocNet'                 => [
            'title'       => 'Передаются ли группы в социальных сетях?',
            'placeholder' => 'Выберите',
        ],
        'socNetList'                       => [
            'title'       => 'Укажите социальные сети',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'socNetItems'                      => [
            'title'               => 'Группы в социальных сетях',
            'link'                => [
                'title'       => 'Ссылка на группу в Facebook',
                'placeholder' => 'https://',
                'tooltip'     => 'tooltip text',
            ],
            'countUsers'          => [
                'title'       => 'Объём пользователей группы в Facebook',
                'placeholder' => 11000,
                'tooltip'     => 'tooltip text',
            ],
            'haveIncome'          => [
                'title'       => 'Получаете ли доход с группы?',
                'placeholder' => 'Выберите',
            ],
            'incomeYear'          => [
                'title'       => 'Доход с группы в год',
                'placeholder' => 1000,
                'tooltip'     => 'tooltip text',
                'prevText'    => 'zł',
            ],
            'incomeQuarter'       => [
                'title'       => 'Доход с группы в квартал ',
                'placeholder' => 1000,
                'tooltip'     => 'tooltip text',
                'prevText'    => 'zł',
            ],
            'turnoverYear'        => [
                'title'       => 'Оборот с группы в год',
                'placeholder' => 1000,
                'tooltip'     => 'tooltip text',
                'prevText'    => 'zł',
            ],
            'turnoverQuarter'     => [
                'title'       => 'Оборот с группы в квартал ',
                'placeholder' => 1000,
                'tooltip'     => 'tooltip text',
                'prevText'    => 'zł',
            ],
            'expensesYear'        => [
                'title'       => 'Расходы с группы в год',
                'placeholder' => 1000,
                'tooltip'     => 'tooltip text',
                'prevText'    => 'zł',
            ],
            'expensesQuarter'     => [
                'title'       => 'Расходы с группы в квартал ',
                'placeholder' => 1000,
                'tooltip'     => 'tooltip text',
                'prevText'    => 'zł',
            ],
            'themes'              => [
                'title'       => 'Тематика группы',
                'placeholder' => 'Выберите',
                'options'     => [
                    ['id' => 1, 'name' => 'Item'],
                    ['id' => 2, 'name' => 'Item'],
                    ['id' => 3, 'name' => 'Item'],
                ]
            ],
            'lang'                => [
                'title'       => 'Языковой сегмент группы',
                'placeholder' => 'Выберите',
                'options'     => [
                    ['id' => 1, 'name' => 'Item'],
                    ['id' => 2, 'name' => 'Item'],
                    ['id' => 3, 'name' => 'Item'],
                ]
            ],
            'methodTransferGroup' => [
                'title'       => 'Способ передачи группы',
                'placeholder' => 'Выберите',
                'options'     => [
                    ['id' => 1, 'name' => 'Item'],
                    ['id' => 2, 'name' => 'Item'],
                    ['id' => 3, 'name' => 'Item'],
                ]
            ],

        ],
        //endregion,
        //region Step 7
        'typeAudience'                     => [
            'title'       => 'Тип аудитории на которую расчитан бизнес',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'genderTargetAudience'             => [
            'title'       => 'Пол целевой аудитории',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'ageMenFrom'                       => [
            'title'       => 'Возраст мужчин',
            'placeholder' => 20,
            'tooltip'     => 'tooltip text',
        ],
        'ageMenTo'                         => [
            'title'       => 'Возраст мужчин',
            'placeholder' => 48,
            'tooltip'     => 'tooltip text',
        ],
        'ageWomenFrom'                     => [
            'title'       => 'Возраст женщин',
            'placeholder' => 20,
            'tooltip'     => 'tooltip text',
        ],
        'ageWomenTo'                       => [
            'title'       => 'Возраст женщин',
            'placeholder' => 48,
            'tooltip'     => 'tooltip text',
        ],
        'sexRatio'                         => [
            'title' => 'Соотношение полов',
            'value' => 50,
        ],

        'familyStatusClients'         => [
            'title'       => 'Семейный статус клиентов',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'aloneClients'                => [
            'title'       => 'Соотношение одиноких',
            'placeholder' => 50,
            'tooltip'     => 'tooltip text',
            'prevText'    => '%',
        ],
        'couplesClients'              => [
            'title'       => 'Соотношение пар',
            'placeholder' => 50,
            'tooltip'     => 'tooltip text',
            'prevText'    => '%',
        ],
        'familiesWithChildrenClients' => [
            'title'       => 'Соотношение семей с детьми',
            'placeholder' => 50,
            'tooltip'     => 'tooltip text',
            'prevText'    => '%',
        ],

        'socialStatusClients' => [
            'title'       => 'Социальные статусы клиентов',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'childClients'        => [
            'title'       => 'Соотношение детей',
            'placeholder' => 50,
            'tooltip'     => 'tooltip text',
            'prevText'    => '%',
        ],
        'studentsClients'     => [
            'title'       => 'Соотношение студентов',
            'placeholder' => 50,
            'tooltip'     => 'tooltip text',
            'prevText'    => '%',
        ],
        'pensionersClients'   => [
            'title'       => 'Соотношение пенсонеров',
            'placeholder' => 50,
            'tooltip'     => 'tooltip text',
            'prevText'    => '%',
        ],

        'averageIncomeTargetClientsFrom' => [
            'title'       => 'Средний уровень доходов целевых клиентов',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
        ],
        'averageIncomeTargetClientsTo'   => [
            'title'       => 'Средний уровень доходов целевых клиентов',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
        ],

        'averageCheckClients'                  => [
            'title'       => 'Средний чек клиента',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],
        'mainAdvertisingSourcesAttractClients' => [
            'title'       => 'Основные рекламные источники привлечение клиентов',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'mainCategoryBusinessPartners'         => [
            'title'       => 'Основаня категория партнёров по бизнесу',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'haveExistingContracts'                => [
            'title'       => 'Наличие действущих контрактов?',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'listContracts'                        => [
            'title'     => [
                'title'       => 'Название контракта №',
                'placeholder' => 'Укажите название контракта',
                'tooltip'     => 'tooltip text',
            ],
            'finalDate' => [
                'title'       => 'Срок действия контракта №',
                'tooltip'     => 'tooltip text',
                'placeholder' => '25.02.2020',
            ],
        ],
        'countPerpetualServiceContracts'       => [
            'title'       => 'Количество бессрочных договров на оказания улсуг',
            'placeholder' => 4,
            'tooltip'     => 'tooltip text',
        ],
        'averageCheckClients'                  => [
            'title'       => 'Средний чек клиента',
            'placeholder' => 1000,
            'tooltip'     => 'tooltip text',
            'prevText'    => 'zł',
        ],
        'mainAdvertisingSourcesAttractClients' => [
            'title'       => 'Основные рекламные источники привлечение клиентов',
            'placeholder' => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        //endregion
        //region Step 8
        'legalStatus'                          => [
            'title'         => 'Юридический статус',
            'placeholder'   => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'taxSystem'                            => [
            'title'         => 'Система налогообложения',
            'placeholder'   => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'changesProfileLegalEntity'            => [
            'title'         => 'Были изменения профиля деятельности в юридическом лице?',
            'placeholder'   => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'havePenalties'                        => [
            'title'         => 'Непокрытые штрафные санкции, наложенные фискальными органами?',
            'placeholder'   => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'listPenalties'                        => [
            'title'         => 'Укажите штрафные санкции',
            'placeholder'   => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'haveDisputableSituations'             => [
            'title'         => 'Вовлечение в спорные/коммерческие/административные ситуации?',
            'placeholder'   => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'listDisputableSituations'             => [
            'title'         => 'Укажите типы спорных ситуаций',
            'placeholder'   => 'Выберите',
            'options'     => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        //endregion
    ]


];
