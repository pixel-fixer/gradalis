<?php

return [
    //region Покупка юридического лица
    'buyCompany' => [
        'title' => 'Покупка юридического лица',
        'step2Desc' => 'Данная форма не является обязательна к заполнению. В случае если вы являетесь юридическим лицом и не желаете предоставлять свои данные. Можете перейти на следующий шаг',
    ],
    //endregion

    ////region Подбор персонала
    'recruiting' => [
        'title' => 'Подбор персонала',
    ],
    //endregion
    'basicInformation' => 'Основная информация',
    'legalEntityData' => 'Данные юридического лица',
    'orderFormation' => 'Формирование заказа',
    'tenantData' => 'Данные нанимателя',
    'leaseSheet' => 'Лист по найму',
    'orderService' => 'Заказать услугу',
    'vacancy' => 'Вакансия',
    'removeVacancy' => 'Удалить вакансию',
    'addVacancy' => 'Добавить вакансию',
    'jobVacancy' => 'Вакансия на должность',
    'requirementsVacancy' => 'Требования к вакансии',
    'create' => [
        'surname' => [
            'title' => 'Ваша фамилия',
            'placeholder' => 'Введите Вашу фамилию (латиницей)',
        ],
        'name' => [
            'title' => 'Ваше имя',
            'placeholder' => 'Введите Ваше имя (латиницей)',
        ],
        'patronymic' => [
            'title' => 'Ваше отчество',
            'placeholder' => 'Введите Ваше отчество (латиницей)',
        ],
        'address' => [
            'title' => 'Ваш адрес',
            'placeholder' => 'Укажите ваш адрес',
        ],
        'phone' => [
            'title' => 'Контактный телефон',
            'placeholder' => '+48 456 566-09-23',
        ],
        'phonePoland' => [
            'title' => 'Контактный телефон в Польше',
            'placeholder' => '+48 456 566-09-23',
        ],
        'email' => [
            'title' => 'Контактный email',
            'placeholder' => 'example@domain.com',
        ],
        'skype' => [
            'title' => 'Контактный Skype',
            'placeholder' => 'Укажите Ваш Skype аккаунт',
        ],

        'nameLegalEntity' => [
            'title' => 'Название юридического лица',
            'placeholder' => 'Введите название юридического лица',
        ],
        'addressLegalEntity' => [
            'address' => [
                'title' => 'Адрес юридического лица',
                'placeholder' => 'Укажите адрес',
            ],
            'houseNumber' => [
                'title' => 'Номер дома',
            ],
            'officeNumber' => [
                'title' => 'Номер офиса',
            ],
            'index' => [
                'title' => 'Индекс',
            ],
        ],
        'krsRegonNumber' => [
            'title' => 'KRS/REGON номер',
            'placeholder' => 'Укажите KRS или REGON номер',
        ],

        'typeLegalEntity' => [
            'title' => 'Вид юридического лица',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'ООО'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'typeActivity' => [
            'title' => 'Вид деятельности',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Страховка'],
                ['id' => 2, 'name' => 'Item 2'],
                ['id' => 3, 'name' => 'Item 3'],
                ['id' => 4, 'name' => 'Item 4'],
                ['id' => 5, 'name' => 'Item 5'],
                ['id' => 6, 'name' => 'Item 6'],
                ['id' => 7, 'name' => 'Item 7'],
            ]
        ],
        'ageLegalEntity' => [
            'title' => 'Возраст юридического лица',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'до 2 лет'],
                ['id' => 2, 'name' => 'Item 2'],
                ['id' => 3, 'name' => 'Item 3'],
                ['id' => 4, 'name' => 'Item 4'],
            ]
        ],
        'activityWorking' => [
            'title' => 'Активная деятельность',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Осуществлялась'],
                ['id' => 2, 'name' => 'Item 2'],
            ]
        ],
        'annualTurnover' => [
            'title' => 'Годовой оборот',
        ],
        'additionalWishes' => [
            'title' => 'Дополнительные пожелания',
            'placeholder' => 'Укажите Ваши пожелания',
        ],
        'placeWork' => [
            'title' => 'Место работы',
        ],
        'termEmployment' => [
            'title' => 'Срок найма',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'fieldActivity' => [
            'title' => 'Сфера деятельности',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],

        'termsEmployment' => [
            'title' => 'Условия найма',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'С включением в штат'],
                ['id' => 2, 'name' => 'По лизингу'],
            ]
        ],
        'availabilityPhoto' => [
            'title' => 'Наличие фото',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Да'],
                ['id' => 2, 'name' => 'Нет'],
            ]
        ],
        'specialty' => [
            'title' => 'Специальность',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'termContract' => [
            'title' => 'Срок контракта',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'termContractLeasing' => [
            'title' => 'Срок найма',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Item'],
                ['id' => 2, 'name' => 'Item'],
                ['id' => 3, 'name' => 'Item'],
            ]
        ],
        'numberEmployees' => [
            'title' => 'Количество сотрудников',
            'placeholder' => 'Введите количество сотрудников',
        ],
        'availabilityResume' => [
            'title' => 'Наличие резюме',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Да'],
                ['id' => 2, 'name' => 'Нет'],
            ]
        ],
        'monthlySalary' => [
            'title' => 'Ежемесячный оклад',
        ],
        'ratePerHour' => [
            'title' => 'Ставка в час',
        ],
        'workingHoursPerMonth' => [
            'title' => 'Отработка часов в месяц',
        ],
        'taxIncluded' => [
            'title' => 'С учетом налогов',
        ],
        'taxAgencyIncluded' => [
            'title' => 'С учетом доли агентства',
        ],
        'preferences' => [
            'title' => 'Преференции',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Item 2'],
                ['id' => 2, 'name' => 'Item 3'],
                ['id' => 3, 'name' => 'Item 4'],
            ]
        ],
        'experienceInProfession' => [
            'title' => 'Опыт работы по профессии',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Item 2'],
                ['id' => 2, 'name' => 'Item 3'],
                ['id' => 3, 'name' => 'Item 4'],
            ]
        ],
        'gender' => [
            'title' => 'Пол',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Item 2'],
                ['id' => 2, 'name' => 'Item 3'],
                ['id' => 3, 'name' => 'Item 4'],
            ]
        ],
        'education' => [
            'title' => 'Образование',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Item 2'],
                ['id' => 2, 'name' => 'Item 3'],
                ['id' => 3, 'name' => 'Item 4'],
            ]
        ],
        'scheduleWork' => [
            'title' => 'График работы',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Item 2'],
                ['id' => 2, 'name' => 'Item 3'],
                ['id' => 3, 'name' => 'Item 4'],
            ]
        ],
        'typeEmployment' => [
            'title' => 'Тип занятости',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Item 2'],
                ['id' => 2, 'name' => 'Item 3'],
                ['id' => 3, 'name' => 'Item 4'],
            ]
        ],
        'modeWork' => [
            'title' => 'Режим работы',
            'placeholder' => 'Выберите',
            'options' => [
                ['id' => 1, 'name' => 'Item 2'],
                ['id' => 2, 'name' => 'Item 3'],
                ['id' => 3, 'name' => 'Item 4'],
            ]
        ],
        'wishesEmployer' => [
            'title' => 'Пожелания нанимателя',
            'placeholder' => 'Укажите Ваши пожелания',
        ],

    ]

];
