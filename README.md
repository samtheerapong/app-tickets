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

add url manager 

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