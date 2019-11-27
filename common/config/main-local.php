<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=dien-may',
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'auto@hellomedia.vn',
                'password' => 'OXS6U0iUNY0Pang',
                'port' => '587',
                'encryption' => 'tls',

            ],
//        ],
//        'mail' => [
//            'class'            => yii\swiftmailer\Mailer::class,
//            'useFileTransport' => false,
//            'messageConfig'    => [
//                'charset' => 'UTF-8',
//                'from'    => ['nvdiepse@gmail.com' => 'Inno group'],
//            ],
//            //'viewPath' => '@common/mail',
//            'transport'        => [
//                'class'         => 'Swift_SmtpTransport',
//                'host'          => 'smtp.gmail.com',
//                'username'      => 'ngogiadiepit@gmail.com',
//                'password'      => '',
//                'port'          => '587',
//                'encryption'    => 'tls',
//
//            ],
        ],
    ],
];
