<p align="center">
    <a href="#" target="_blank">
        <img src="https://avatars.githubusercontent.com/u/130217376?s=96&v=4" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Project Dinamic form</h1>
    <br>
</p>

<b>ตัวแย่าง Dinamic form</b>

1. git clone https://github.com/samtheerapong/app-tickets.git
2. cd app-tickets
3. composer update
   http://localhost/app-tickets/web/ticket/index

<b>คู่มือส่วนตัว</b>

กำหนดสิทธิ์

## ติดตั้ง dektrium user

1. Download
   Command -> composer require dektrium/yii2-user
2. Config
   config\web.php

```
    'components' => [
        'user' => [
            //'identityClass' => 'app\models\User',
            'identityClass' => 'dektrium\user\models\User',
            'enableAutoLogin' => false,
        ],

    ],
```

modules ระดับเดียวกับ components

```
'components' => [],
'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
            'enableUnconfirmedLogin' => true,
            'confirmWithin' => 21600,
            'cost' => 12,
            'admins' => ['admin']
        ],

    ],
```

3. Migrate ลง Database

Command ->   php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations


อ้างอิง
https://github.com/dektrium/yii2-user

List available actions
https://github.com/dektrium/yii2-user/blob/master/docs/available-actions.md









กำหนด url manager

```
'urlManager' => [
            'class' => 'yii\web\UrlManager',
            // Disable index.php
            'showScriptName' => false,
            // Disable r= routes
            'enablePrettyUrl' => true,
            'rules' => [
                '<controller:\w+>/<id:\d+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
                ['class' => 'yii\rest\UrlRule', 'controller' => 'location', 'except' => ['delete', 'GET', 'HEAD', 'POST', 'OPTIONS'], 'pluralize' => false],
                '<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
            ],
        ],
</code>
```
