<?php
return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'bootstrap' => [
        'configManager',
    ],

    'components' => [        
        'configManager' => [
            'class' => 'yii2tech\config\Manager',
            'autoRestoreValues' => false,
            'cache' => 'dummyCache',
            'cacheDuration' => -1,
            'storage' => [
                'class' => 'yii2tech\config\StoragePhp',
                'fileName' => "@frontend/runtime/app_config.php",
            ],
            'items' => [
                'companyName' => [
                    'path' => 'company',
                    'label' => Yii::t('app', "COMPANY_NAME"),
                    'description' => Yii::t('app', "COMPANY_NAME_DESCRIPTION"),
                    'value' => "DIVO GROUP",
                    'rules' => [
                        ['required']
                    ],
                ],
                'contactPhone' => [
                    'path' => 'phone',
                    'label' => Yii::t('app', "CONTACT_PHONE"),
                    'description' => Yii::t('app', "CONTACT_PHONE DESCRIPTION"),
                    'value' => "8 800 454 42 56",
                    'rules' => [
                        ['required']
                    ],
                    'inputOptions' => [
                        'type' => 'phone',
                    ],
                ],
                'contactEmail' => [
                    'path' => 'email',
                    'label' => Yii::t('app', "CONTACT_EMAIL"),
                    'description' => Yii::t('app', "CONTACT_EMAIL DESCRIPTION"),
                    'value' => "info@duvigroup.ru",
                    'rules' => [
                        ['required'],
                        ['email']
                    ],
                ],
                'contactWA' => [
                    'path' => 'wa',
                    'label' => Yii::t('app', "CONTACT_WHATSAPP"),
                    'description' => Yii::t('app', "CONTACT_WHATSAPP DESCRIPTION"),
                    'value' => "https://wa.me/79268181180",
                    'rules' => [
                        ['required'],
                        ['url']
                    ],
                ],
                'contactTG' => [
                    'path' => 'tg',
                    'label' => Yii::t('app', "CONTACT_TG"),
                    'description' => Yii::t('app', "CONTACT_TG DESCRIPTION"),
                    'value' => "tg://resolve?domain=esc00000",
                    'rules' => [
                        ['required'],
                    ],
                ],
                'seoDefaultTitle' => [
                    'path' => 'seo_title',
                    'label' => Yii::t('app', "SEO_TITLE"),
                    'description' => Yii::t('app', "SEO_TITLE DESCRIPTION"),
                    'value' => "Квартиры в Сочи",
                    'rules' => [
                    ],
                ],
                'seoDefaultKeywords' => [
                    'path' => 'seo_keywords',
                    'label' => Yii::t('app', "SEO_KEYWORDS"),
                    'description' => Yii::t('app', "SEO_KEYWORDS DESCRIPTION"),
                    'value' => "Сдать квартиру в Сочи",
                    'rules' => [
                    ],
                ],
                'seoDefaultDescription' => [
                    'path' => 'seo_description',
                    'label' => Yii::t('app', "SEO_DESCRIPTION"),
                    'description' => Yii::t('app', "SEO_DESCRIPTION DESCRIPTION"),
                    'value' => "Сдаем и сопровождаем квартиры в Сочи",
                    'rules' => [
                    ],
                    'inputOptions' => [
                        'type' => 'textarea',
                    ],
                ],
                'isWebSiteOffline' => [
                    'path' => 'is_website_offline',
                    'label' => Yii::t('app', "IS_WEBSITE_OFFLINE"),
                    'description' => Yii::t('app', "IS_WEBSITE_OFFLINE DESCRIPTION"),
                    'value' => false,
                    'rules' => [
                    ],
                    'inputOptions' => [
                        'type' => 'checkbox',
                    ],
                ],
                'reportTelegramChatID' => [
                    'path' => 'report_telegram_chat_id',
                    'label' => Yii::t('app', "REPORT_TELEGRAM_CHAT_ID"),
                    'description' => Yii::t('app', "REPORT_TELEGRAM_CHAT_ID DESCRIPTION"),
                    'value' => "-970025313",
                    'rules' => [
                    ],
                ],
            ],
        ],
        'telegram' => [
            'class' => 'aki\telegram\Telegram',
            'botToken' => '',
        ],
        'cache' => [
            'class' => YII_ENV_PROD ? \yii\caching\FileCache::class : \yii\caching\DummyCache::class,
        ],
        'dummyCache' => [
            'class' => 'yii\caching\DummyCache',
        ],


    ],
];
