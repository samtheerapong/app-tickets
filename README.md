<p align="center">
    <a href="#" target="_blank">
        <img src="https://avatars.githubusercontent.com/u/130217376?s=96&v=4" height="100px">
    </a>
    <h1 align="center">Yii 2 Basic Ticket</h1> ระบบแจ้งซ่อม
    <br>
</p>

<b>ตัวแย่าง Dinamic form</b>

1. git clone https://github.com/samtheerapong/app-tickets.git
2. cd app-tickets
3. composer update
```php
composer update
```
   http://localhost/app-tickets/web/ticket/index

# <b>คู่มือส่วนตัว</b>

``` html
https://shorturl.at/jlGL9
```

# กำหนดสิทธิ์

# ติดตั้ง dektrium user

##  1. Download

```php
composer require dektrium/yii2-user
```
## 2. Config
   config\web.php

```php
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

## 3. Migrate ลง Database
```php
php yii migrate/up --migrationPath=@vendor/dektrium/yii2-user/migrations
```


อ้างอิง
https://github.com/dektrium/yii2-user


# List of available actions

Yii2-user includes a lot of actions, which you can access by creating URLs for them. Here is the table of available
actions which contains route and short description of each action. You can create URLs for them using special Yii
helper `\yii\helpers\Url::to()`.

- **/user/registration/register** Displays registration form
- **/user/registration/resend**   Displays resend form
- **/user/registration/confirm**  Confirms a user (requires *id* and *token* query params)
- **/user/security/login**        Displays login form
- **/user/security/logout**       Logs the user out (available only via POST method)
- **/user/recovery/request**      Displays recovery request form
- **/user/recovery/reset**        Displays password reset form (requires *id* and *token* query params)
- **/user/settings/profile**      Displays profile settings form
- **/user/settings/account**      Displays account settings form (email, username, password)
- **/user/settings/networks**     Displays social network accounts settings page
- **/user/profile/show**          Displays user's profile (requires *id* query param)
- **/user/admin/index**           Displays user management interface

## Example of menu

You can add links to registration, login and logout as follows:

```php
Yii::$app->user->isGuest ?
    ['label' => 'Sign in', 'url' => ['/user/security/login']] :
    ['label' => 'Sign out (' . Yii::$app->user->identity->username . ')',
        'url' => ['/user/security/logout'],
        'linkOptions' => ['data-method' => 'post']],
['label' => 'Register', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest]
```

ตัวอย่าง confirm link
```
http://localhost/project/web/user/registration/confirm?id=1&code=xxxxxxxxxxxx
```
** code นำมาจากตาราง token ของ id user นั้นๆ


# ติดตั้ง dektrium rbac
## 1.	Download
```php
composer require dektrium/yii2-rbac:1.0.0-alpha@dev
```
## 2.	Config
config\console.php
```php
'components' => [
        'authManager'=>[
            'class'=>'dektrium\rbac\components\DbManager'
        ],
],

```

config\web.php
```php
'modules' => [
        'rbac' => 'dektrium\rbac\RbacWebModule',   
    ],

```
## 3. Migrate ลง Database

```
php yii migrate/up --migrationPath=@yii/rbac/migrations
```

อ้างอิง https://github.com/dektrium/yii2-rbac

Youtube https://www.youtube.com/watch?v=zKkPRMjD4Fs



# ติดตั้ง RBAC Manager

## 1.	Download
```php
composer require mdmsoft/yii2-admin "~2.0"
```
## 2.	Config
config\web.php
```php
'modules' => [
      'admin' => [
            'class' => 'mdm\admin\Module',
           'layout'=>'left-menu'
         ],
    ],
```

```php
'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            '*', //Allow All For Dev
            'site/*',
            'admin/*',
        ]
    ],
'components' => [],
```

ตัวอย่างเมนู Navbar
```php
echo Nav::widget([
        'options' => ['class' => 'navbar-nav ml-auto'],
        'items' => [
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Contact', 'url' => ['/site/contact']],
            Yii::$app->user->isGuest ?
                ['label' => 'Login', 'url' => ['/user/security/login']] :
                ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                    'url' => ['/user/security/logout'],
                    'linkOptions' => ['data-method' => 'post']],
                ['label' => 'Register', 'url' => ['/user/registration/register'], 'visible' => Yii::$app->user->isGuest]
        ],
    ]);
```



# กำหนด url manager
กำหนดใน config\web.php
```php
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
```
