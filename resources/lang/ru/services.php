<?php

return [
    //region Покупка юридического лица
    'buyCompany' => [
        'title' => 'Покупка юридического лица',
    ],
    //endregion
    'basicInformation' => 'Основная информация',
    'legalEntityData' => 'Данные юридического лица',
    'orderFormation' => 'Формирование заказа',
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
        'step2Desc' => 'Данная форма не является обязательна к заполнению. В случае если вы являетесь юридическим лицом и не желаете предоставлять свои данные. Можете перейти на следующий шаг',

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

    ]

];
